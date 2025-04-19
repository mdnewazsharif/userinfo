<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Seller',
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2a$12$3OZ7tprlyOlNZnoWhnS0wOoFnXD1.Jb8RF/7jiEf0d4tu/M03VcmW', // password
            // 'remember_token' => Str::random(10),
        ];
    }
}
