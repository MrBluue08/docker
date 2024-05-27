<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Faker;
use Illuminate\Support\Str;
use App\Models\Room;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Room::class;

    public function definition(): array
    {
        return [
            'roomName' => fake()->name(),
            'roomDescription'=> fake()-> words(25, true),
            'roomMaxTeams' => $roomMaxTeams = fake()->numberBetween(3, 9),
            'roomMaxTime'=>fake()->numberBetween(60,90),
            'roomDate'=>fake()->dateTime()->format('Y-m-d H:i:s'),
            'roomTotalTeams'=>fake()->numberBetween(0, $roomMaxTeams),
            'roomStructueImg' => 'ruta.jpg',
            'roomPromotionImg' => 'ruta.jpg',
            'roomPromotionCost' => fake()-> numberBetween(1000, 2500),
            'roomInsuranceCost' => fake()-> numberBetween(1000, 2500),
            'roomInscriptionPrice'  => fake()-> numberBetween(100, 150),
            'roomInscriptionPriceMembers' => fake()->numberBetween(70, 120),
            'active' => '1'
        ];
    }
}
