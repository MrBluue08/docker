<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Team;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Team::class;
    public function definition(): array
    {
        return [
            'teamName' => fake()->userName(),
            'leagueParticipant' => fake()->numberBetween(0,1),
            'roomsDone'=>fake()->numberBetween(0,100),
            'points'=>fake()->numberBetween(0,9999),
            'teamLeadMail' => User::inRandomOrder()->first()->userMail,
            'active'=>'1'
        ];
    }
}
