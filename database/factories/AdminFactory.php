<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'id' => $this->faker->uuid(),
            // 'id' => $this->faker->uuid(),
            // 'full_name' => $this->faker->name(),
            'full_name' => 'muhammad',
            // 'full_name' => 'mahmud',
            // 'email' => $this->faker->freeEmail(),
            'email'     =>  'viker1299@gmail.com',
            // 'email' => 'mahmud@gmail.com',
            // 'email_verified_at' => now(),
            // 'username' => $this->faker->userName(),
            'username' => 'muhammad',
            // 'username' => 'mahmud',
            'password' => Hash::make('Admin12'),
            //
        ];
    }
}
