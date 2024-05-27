<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\SponsorCompanie;
use App\Models\Room;
use App\Models\Team;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamSignup>
 */
class TeamSignupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'roomId' => Room::inRandomOrder()->first()->id,
            'teamId' => Team::inRandomOrder()->first()->id,
            'dorsal' => fake()->randomNumber(3,false)
        ];
    }
}
