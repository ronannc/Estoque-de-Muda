<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class NurseryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    => $this->faker->name(),
            'city_id' => City::all()->random()->id,
            'address' => $this->faker->address(),
            'number'  => $this->faker->numberBetween( 100, 999 ),
        ];
    }
}
