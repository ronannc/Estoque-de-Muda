<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Group;
use App\Models\Nursery;
use App\Models\Specie;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'quantity'    => $this->faker->numberBetween(1, 50),
            'type' => $this->faker->numberBetween(1, 2),
            'specie_id' => Specie::all()->random(),
            'nursery_id' => Nursery::all()->random(),
            'date' => $this->faker->dateTimeBetween('-1 year'),
            'observation' => $this->faker->text(100),
            'responsible' => $this->faker->firstName(),
            'destiny' => $this->faker->streetName(),
        ];
    }
}
