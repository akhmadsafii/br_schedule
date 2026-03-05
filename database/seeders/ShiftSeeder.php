<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    public function run(): void
    {
        $shifts = [
            ['code' => 'P', 'name' => 'Pagi', 'color' => '#f472b6', 'start_time' => '07:00:00', 'end_time' => '15:00:00'],
            ['code' => 'S', 'name' => 'Siang', 'color' => '#60a5fa', 'start_time' => '15:00:00', 'end_time' => '23:00:00'],
            ['code' => 'M', 'name' => 'Malam', 'color' => '#34d399', 'start_time' => '23:00:00', 'end_time' => '07:00:00'],
            ['code' => 'L', 'name' => 'Libur', 'color' => '#facc15', 'start_time' => '00:00:00', 'end_time' => '00:00:00'],
        ];

        foreach ($shifts as $shift) {
            Shift::updateOrCreate(
                ['code' => $shift['code']],
                $shift
            );
        }
    }
}
