<?php

namespace Database\Seeders;

use App\Models\SponsorCompanie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorCompanieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        SponsorCompanie::factory(15)->create();
    }
}
