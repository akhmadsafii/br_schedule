<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Month;
use App\Models\Schedule;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $month = Month::where('year', 2026)->where('month', 3)->first();
        if (!$month) {
            return;
        }

        $shifts = Shift::orderBy('code')->get();
        $employees = Employee::orderBy('name')->get();

        if ($shifts->isEmpty() || $employees->isEmpty()) {
            return;
        }

        $daysInMonth = Carbon::create($month->year, $month->month, 1)->daysInMonth;

        foreach ($employees as $employee) {
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $date = Carbon::create($month->year, $month->month, $day)->toDateString();
                $shift = $this->pickShift($shifts);

                Schedule::updateOrCreate(
                    ['employee_id' => $employee->id, 'date' => $date],
                    [
                        'month_id' => $month->id,
                        'shift_id' => $shift->id,
                        'created_by' => 'seeder',
                    ]
                );
            }
        }
    }

    private function pickShift($shifts): Shift
    {
        $weighted = [];

        foreach ($shifts as $shift) {
            $weight = 1;
            if ($shift->code === 'L') {
                $weight = 2;
            }

            for ($i = 0; $i < $weight; $i++) {
                $weighted[] = $shift;
            }
        }

        return $weighted[array_rand($weighted)];
    }
}
