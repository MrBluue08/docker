<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\SponsorCompanie;
use App\Models\User;
use App\Models\Team;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamInvitation>
 */
class TeamInvitationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'teamID' => Team::inRandomOrder()->first()->id,
            'invitedUserMail' => User::inRandomOrder()->first()->userMail
        ];
    }
}
