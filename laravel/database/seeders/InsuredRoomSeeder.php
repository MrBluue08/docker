<?php

namespace Database\Seeders;

use App\Models\InsuredRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsuredRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InsuredRoom::factory(5)->create();
    }
}
