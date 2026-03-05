<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Month;
use App\Models\Schedule;
use App\Models\Shift;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller
{
    public function publicIndex(Request $request)
    {
        $token = $request->query('token');
        $publicEmployee = $token
            ? Employee::where('token', $token)->first()
            : null;

        $context = $this->buildScheduleContext($publicEmployee);
        $context['token'] = $token;
        $context['publicEmployee'] = $publicEmployee;
        $context['editable'] = !$context['isFinal'];

        if (!$publicEmployee) {
            $context['employees'] = collect();
            $context['scheduleMap'] = [];
        }

        return view('public.schedule', $context);
    }

    public function adminIndex(Request $request)
    {
        $context = $this->buildScheduleContext();
        $context['editable'] = !$context['isFinal'];

        return view('admin.schedule', $context);
    }

    private function buildScheduleContext(?Employee $employee = null): array
    {
        $month = Month::orderByDesc('year')
            ->orderByDesc('month')
            ->first();

        $monthLabel = $month
            ? sprintf('%04d-%02d', $month->year, $month->month)
            : 'Not Set';

        $isFinal = $month ? strtoupper($month->status) === 'FINAL' : false;

        $employees = $employee
            ? collect([$employee])
            : Employee::orderBy('name')->get();

        $shifts = Shift::orderBy('code')->get();

        $days = [];
        if ($month) {
            $daysInMonth = Carbon::create($month->year, $month->month, 1)->daysInMonth;
            $days = range(1, $daysInMonth);
        }

        $scheduleMap = [];
        $monthTotals = [];

        if ($month) {
            $scheduleQuery = Schedule::with('shift')
                ->where('month_id', $month->id);

            if ($employee) {
                $scheduleQuery->where('employee_id', $employee->id);
            }

            $schedules = $scheduleQuery->get();

            foreach ($schedules as $schedule) {
                if (!$schedule->date) {
                    continue;
                }

                $dateKey = $schedule->date->toDateString();
                $scheduleMap[$schedule->employee_id][$dateKey] = $schedule->shift;
            }

            $monthTotals = Schedule::select('shift_id', DB::raw('COUNT(*) as total'))
                ->where('month_id', $month->id)
                ->groupBy('shift_id')
                ->pluck('total', 'shift_id')
                ->toArray();
        }

        $totalEmployees = Employee::count();
        $scheduledEmployees = 0;
        $pendingEmployees = 0;

        if ($month) {
            $scheduledEmployees = Schedule::where('month_id', $month->id)
                ->distinct('employee_id')
                ->count('employee_id');
            $pendingEmployees = max($totalEmployees - $scheduledEmployees, 0);
        }

        return compact(
            'month',
            'monthLabel',
            'isFinal',
            'employees',
            'shifts',
            'days',
            'scheduleMap',
            'monthTotals',
            'totalEmployees',
            'scheduledEmployees',
            'pendingEmployees'
        );
    }
}
