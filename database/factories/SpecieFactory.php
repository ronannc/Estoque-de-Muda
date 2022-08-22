<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    => $this->faker->firstName(),
            'specie' => $this->faker->firstName(),
            'group_id' => Group::all()->random(),
        ];
    }
}
