<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
           'email_verified' =>$this->faker-> randomElement([false,true]),
            'mobile' =>$this->faker->phoneNumber(),
            'mobile_verified' =>$this->faker-> randomElement([false,true]),
    
           'shipping_address'=>$this->faker->numberBetween(1,100),
           'billing_address'=>$this->faker->numberBetween(1,100),
           'role_id'=>$this->faker->numberBetween(1,3),

           'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'api_token'=>bin2hex(openssl_random_pseudo_bytes(30)),
           'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
