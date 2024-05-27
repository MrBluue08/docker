<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\SponsorCompanie;
use App\Models\Room;
use App\Models\Sponsor;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sponsor>
 */
class SponsorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Sponsor::class;

    public function definition(): array
    {
        return [
            'roomId' => Room::inRandomOrder()->first()->id,
            'sponsorId' => SponsorCompanie::inRandomOrder()->first()->CIF
        ];
    }
}
