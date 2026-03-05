<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            ShiftSeeder::class,
            MonthSeeder::class,
            EmployeeSeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
