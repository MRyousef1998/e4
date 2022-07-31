<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [
            'user_reviewer_id'=>$this->faker->numberBetween(1,100),
            'auction_id'=>$this->faker->numberBetween(1,100),
            'stars'=>$this->faker->numberBetween(1,5),
    
            'comment'=>$this->faker->paragraph(),
            //
        ];
    }
}
