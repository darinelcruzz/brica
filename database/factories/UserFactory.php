<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Lab3',
            'email' => 'admin',
            'level' => '1',
            'password' => Hash::make('helefante'),
            'pass' => 'helefante',
            'user' => '0',
            'remember_token' => 'DTRFU4GHOHFKJ',
        ];
    }
}
