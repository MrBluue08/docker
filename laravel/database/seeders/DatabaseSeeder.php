<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\InsuranceCompanie;
use App\Models\InsuredRoom;
use App\Models\Room;
use App\Models\SponsorCompanie;
use App\Models\Sponsor;
use App\Models\TeamInvitation;
use App\Models\Team;
use App\Models\TeamSignup;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::factory(5)->create();
        Room::factory(15)->create();
        User::factory(35)->create();
        Team::factory(20)->create();
        SponsorCompanie::factory(15)->create();
        InsuranceCompanie::factory(10)->create();
        TeamInvitation::factory(15)->create();
        TeamSignup::factory(12)->create();
        InsuredRoom::factory(5)->create();
        Sponsor::factory(3)->create();

    }
}
