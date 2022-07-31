<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street_name'=>$this->faker->streetName(),
            'street_number'=>$this->faker->numberBetween(1,5000),
             'city_id'=>$this->faker->numberBetween(1,50),
            'state_id'=>$this->faker->numberBetween(1,50),
            'country_id'=>$this->faker->numberBetween(1,50),
        
            'post_code'=>$this->faker->postcode,
        ];
    }
}
