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
            'hr_id' => 'd51389c9-103e-309f-a339-d380fe72efb2',
            'date_time_open_form_innovation' => Carbon::now(),
            'status_open_form_innovation' => 1,
            'date_time_expired_form_innovation'  => Carbon::tomorrow(),
            'status_expired_form_innovation' => 1,
        ]);
    }
}
