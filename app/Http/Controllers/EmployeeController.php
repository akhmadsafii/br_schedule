<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::orderBy('name')->get();

        return view('admin.employees.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employees.form', [
            'employee' => new Employee(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'token' => ['nullable', 'string', 'max:255', 'unique:employees,token'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (empty($data['token'])) {
            $data['token'] = Str::random(32);
        }

        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        Employee::create($data);

        return redirect()->route('admin.employees.index')->with('status', 'Karyawan berhasil ditambahkan.');
    }

    public function edit(Employee $employee)
    {
        return view('admin.employees.form', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'token' => ['required', 'string', 'max:255', 'unique:employees,token,' . $employee->id],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = (bool) ($data['is_active'] ?? false);

        $employee->update($data);

        return redirect()->route('admin.employees.index')->with('status', 'Karyawan berhasil diperbarui.');
    }

    public function destroy(Employee $employee)
    {
        try {
            $employee->delete();
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menghapus karyawan. Pastikan tidak ada jadwal terkait.');
        }

        return back()->with('status', 'Karyawan berhasil dihapus.');
    }
}
