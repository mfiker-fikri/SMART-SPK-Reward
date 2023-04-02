<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class HumanResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\HumanResource::factory()->create();

        // \App\Models\HumanResource::insert([
        //     'id'        =>  $this->faker->uuid(),
        //     'full_name' =>  'muhammad',
        //     'email'     =>  'viker1299@gmail.com',
        //     'username'  =>  'muhammad',
        //     'password'  =>  Hash::make('Admin12'),
        //     'role'      =>  3,
        // ]);


    }
}
