<?php

namespace Database\Seeders;

use App\Models\TeamInvitation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamInvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamInvitation::factory(5)->create();
    }
}
