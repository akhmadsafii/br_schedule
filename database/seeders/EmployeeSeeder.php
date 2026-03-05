<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $employees = [
            ['name' => 'Dra. Retno H', 'nip' => '196910252000032004', 'department' => 'Pharmacy'],
            ['name' => 'Nita Dwi K', 'nip' => '198812290201201001', 'department' => 'Pharmacy'],
            ['name' => 'Fatma A. S', 'nip' => '199506152020120017', 'department' => 'Pharmacy'],
            ['name' => 'Fani Nurdiyani', 'nip' => '199604272002012016', 'department' => 'Pharmacy'],
            ['name' => 'Rahmi Apriani', 'nip' => '199304042020120019', 'department' => 'Pharmacy'],
            ['name' => 'Adestya Devita', 'nip' => '199706202020120217', 'department' => 'Pharmacy'],
            ['name' => 'Yudha Timor', 'nip' => '198409212024110001', 'department' => 'Pharmacy'],
            ['name' => 'Agusnita K', 'nip' => '199708212024120002', 'department' => 'Pharmacy'],
        ];

        foreach ($employees as $employee) {
            Employee::updateOrCreate(
                ['nip' => $employee['nip']],
                [
                    'name' => $employee['name'],
                    'department' => $employee['department'],
                    'token' => Str::random(32),
                    'is_active' => true,
                ]
            );
        }
    }
}
