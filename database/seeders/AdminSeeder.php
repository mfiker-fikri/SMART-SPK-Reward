<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Str;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Sequence;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin::factory()
        //     ->count(2)
        //     ->state(new Sequence(
        //         ['full_name' => 'muhammad'],
        //         ['full_name' => 'mahmud'],
        //         ['email' => 'muhammad@gmail.com'],
        //         ['email' => 'mahmud@gmail.com'],
        //         ['username' => 'muhammad'],
        //         ['username' => 'mahmud'],
        //     ))
        //     ->create();
        \App\Models\Admin::factory()->create();
        // DB::table('admins')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
