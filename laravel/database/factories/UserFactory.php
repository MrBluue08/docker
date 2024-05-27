<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Team;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

     
    public function definition(): array
    {
        return [
            'userMail' => fake()->unique()->safeEmail() ,
            'userName'  => fake()->name(),
            'userSurname' =>fake()->userName(),
            'userAdress' => fake()->address(),
            'userBirthDay' => fake()->dateTime(),
            'userGender' => fake()->randomElement(['male', 'female', 'non binary']),
            'teamId'=> '0',
            'member'=>fake()->numberBetween(0,1),
            'userPassword' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'active'=>'1',
            'remember_token'=> Str::random(10)
        ];
    }
}
