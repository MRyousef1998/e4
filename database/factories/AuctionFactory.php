<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
       
        return [
        'title'=>$this->faker->sentence,
        'description'=>$this->faker->paragraph(5),
        'minimum_increment'=>$this->faker->numberBetween(100,1000),
        'price'=>$this->faker->randomElement([100,200,300,400,500,600,700,1000,2000,10000]),
        'category_id'=>$this->faker->numberBetween(1,10),
        'user_id'=>$this->faker->numberBetween(1,100),
        'num_increment'=>$this->faker->randomElement([100,200,300,400,]),
        'end_time'=>$this->faker->dateTimeBetween('now', '+1 week'),
    ];
    }
}
