<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,100),
            'auction_id'=>$this->faker->numberBetween(1,100),
            'report_type_id'=>$this->faker->numberBetween(1,3),
            'message'=>$this->faker->paragraph(5),
            'title'=>$this->faker->sentence,
   
        ];
    }
}
