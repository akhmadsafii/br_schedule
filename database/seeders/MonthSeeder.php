<?php

namespace Database\Seeders;

use App\Models\Month;
use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    public function run(): void
    {
        Month::updateOrCreate(
            ['year' => 2026, 'month' => 3],
            ['status' => 'DRAFT', 'finalized_at' => null]
        );
    }
}
