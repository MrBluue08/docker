<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\InsuranceCompanie;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InsuranceCompanie>
 */
class InsuranceCompanieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = InsuranceCompanie::class;

    public function definition(): array
    {
        return [
            'CIF' =>fake()->unique()->randomNumber(9, true),
            'insuranceName' => fake()->name(),
            'insuranceAdress' => fake()->address(),
            'active'=>'1'
        ];
    }
}
