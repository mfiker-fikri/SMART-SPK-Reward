<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Category::insert([
            'id' => 1,
            'category' => 'Inovasi',
        ]);
        \App\Models\Category::insert([
            'id' => 2,
            'category' => 'Teladan',
        ]);
    }
}
