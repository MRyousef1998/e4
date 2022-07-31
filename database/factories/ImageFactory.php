<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url'=>"https://picsum.photos/1200/350?random=".mt_rand(1, 55000),
            'auction_id'=>$this->faker->numberBetween(1,100),
        ];
    }
}
