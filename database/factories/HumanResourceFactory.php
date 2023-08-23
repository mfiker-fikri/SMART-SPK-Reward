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
            'role'      =>  3,
            'admin_id'  =>  'cb4f06ce-bf7f-3ec0-8a25-404acf96d3ce',

            // 'id'        =>  $this->faker->uuid(),
            // 'full_name' =>  'fikri',
            // 'email'     =>  'fikri1299@gmail.com',
            // 'username'  =>  'fikri',
            // 'password'  =>  Hash::make('Admin12'),
            // 'role'      =>  2,

            // 'id'        =>  $this->faker->uuid(),
            // 'full_name' =>  'ahmad',
            // 'email'     =>  'ahmad1299@gmail.com',
            // 'username'  =>  'ahmad',
            // 'password'  =>  Hash::make('Admin12'),
            // 'role'      =>  1,
        ];
    }
}
