<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\SponsorCompanie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SponsorCompanie>
 */
class SponsorCompanieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = SponsorCompanie::class;

    public function definition(): array
    {
        return [
            'CIF' =>fake()->unique()->randomNumber(9, true),
            'mainPage' =>fake()->numberBetween(0,1),
            'sponsorName' => fake()->userName(),
            'sponsorAdress' => fake()->address(),
            'sponsorLogo' => 'ruta.jpg',
            'active'=>'1'
        ];
    }
}
