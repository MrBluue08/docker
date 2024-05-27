<?php

namespace Database\Seeders;

use App\Models\TeamSignup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSignupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamSignup::factory(5)->create();
    }
}
