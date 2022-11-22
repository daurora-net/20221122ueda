<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'gender' => $this->faker->numberBetween(1, 2),
            'email' => $this->faker->unique()->safeEmail(),
            'postcode' => $this->faker->postcode,
            'address' => $this->faker->prefecture . $this->faker->city . $this->faker->streetAddress,
            'opinion' => $this->faker->realText(120),
        ];
    }
}