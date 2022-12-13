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
            'date_time_form_teladan' => Carbon::now(),
            'status' => 1,
        ]);
    }
}
