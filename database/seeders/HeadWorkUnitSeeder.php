<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HeadWorkUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\HeadWorkUnit::factory()->create();
    }
}
