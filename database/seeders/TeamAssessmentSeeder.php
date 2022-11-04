<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TeamAssessmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\TeamAssessment::factory()->create();
    }
}
