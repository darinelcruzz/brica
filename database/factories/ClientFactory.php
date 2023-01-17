<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'contact' => $this->faker->name,
            'rfc' => $this->faker->regexify('[A-Z]{3}+[0-9]{6}+[A-Z]{2}'),
            'city' => $this->faker->city,
        ];
    }
}
