<?php

namespace Database\Seeders;

use App\Models\InsuranceCompanie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuranceCompanieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InsuranceCompanie::factory(10)->create();
    }
}
