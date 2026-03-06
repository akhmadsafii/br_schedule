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

        $requestedYear = $request->query('year');
        $requestedMonth = $request->query('month');
        $selectedYear = $requestedYear ? (int) $requestedYear : null;
        $selectedMonth = $requestedMonth ? (int) $requestedMonth : null;
        $selectedPeriod = null;

        if ($selectedYear && $selectedMonth) {
            $selectedPeriod = Month::where('year', $selectedYear)
                ->where('month', $selectedMonth)
                ->first();
        }

        $context = $this->buildScheduleContext($publicEmployee, $selectedPeriod);
        $context['token'] = $token;
        $context['publicEmployee'] = $publicEmployee;
        $context['editable'] = $publicEmployee ? !$context['isFinal'] : false;
        $context['sidebarEmployees'] = Employee::orderBy('name')->get();
        $context['tokenInvalid'] = (bool) ($token && !$publicEmployee);
        $context['availableMonths'] = Month::orderByDesc('year')
            ->orderByDesc('month')
            ->get();
        $context['selectedYear'] = $selectedYear ?: ($context['month']->year ?? null);
        $context['selectedMonth'] = $selectedMonth ?: ($context['month']->month ?? null);

        return view('public.schedule', $context);
    }

    public function adminIndex(Request $request)
    {
        $context = $this->buildScheduleContext();
        $context['editable'] = !$context['isFinal'];

        return view('admin.schedule', $context);
    }

    public function export(Request $request)
    {
        $context = $this->buildScheduleContext();

        $monthLabel = $context['monthLabel'];
        $days = $context['days'];
        $employees = $context['employees'];
        $scheduleMap = $context['scheduleMap'];
        $month = $context['month'];

        $filename = 'jadwal-' . str_replace('-', '', $monthLabel) . '.csv';

        return response()->streamDownload(function () use ($days, $employees, $scheduleMap, $month) {
            $handle = fopen('php://output', 'w');

            $header = array_merge(['Nama'], $days);
            fputcsv($handle, $header);

            foreach ($employees as $employee) {
                $row = [$employee->name];
                foreach ($days as $day) {
                    $date = $month
                        ? Carbon::create($month->year, $month->month, $day)->toDateString()
                        : null;
                    $shift = $date && isset($scheduleMap[$employee->id][$date])
                        ? $scheduleMap[$employee->id][$date]
                        : null;
                    $row[] = $shift ? $shift->code : '';
                }
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }

    private function buildScheduleContext(?Employee $employee = null, ?Month $month = null): array
    {
        $month = $month ?: Month::orderByDesc('year')
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
