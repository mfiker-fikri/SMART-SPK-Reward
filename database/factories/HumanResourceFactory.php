<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class HumanResourceFactory extends Factory
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
            'id'        =>  $this->faker->uuid(),
            'full_name' =>  'muhammad',
            'email'     =>  'viker1299@gmail.com',
            'username'  =>  'muhammad',
            'password'  =>  Hash::make('Admin12'),
            'role'      =>  1,
        ];
    }
}
