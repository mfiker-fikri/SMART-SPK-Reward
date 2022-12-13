<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TimerCountDownInovasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\CountdownTimerFormInovation::insert([
            'id' => 1,
            'date_time_form_inovation' => Carbon::now(),
            'status' => 1,
        ]);
    }
}
