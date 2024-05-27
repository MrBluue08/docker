<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\SponsorCompanie;
use App\Models\Room;
use App\Models\InsuranceCompanie;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InsuredRoom>
 */
class InsuredRoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'roomId'=>Room::inRandomOrder()->first()->id,
            'insuranceCompanieCIF'=>InsuranceCompanie::inRandomOrder()->first()->CIF,
        ];
    }
}
