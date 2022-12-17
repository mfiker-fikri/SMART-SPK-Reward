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
            'date_time_open_form_inovation' => Carbon::now(),
            'status_open' => 1,
            'date_time_expired_form_inovation'  => Carbon::tomorrow(),
            'status_expired' => 1,
        ]);
    }
}
