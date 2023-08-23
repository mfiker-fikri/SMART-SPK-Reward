<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TimerCountDownTeladanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\CountdownTimerFormTeladan::insert([
            'id' => 1,
            'hr_id' => 'd51389c9-103e-309f-a339-d380fe72efb2',
            'date_time_open_appraisement' => Carbon::now(),
            'status_open_appraisement' => 1,
            'date_time_open_appraisement' => Carbon::tomorrow(),
            'status_expired_appraisement' => 1,
        ]);
    }
}
