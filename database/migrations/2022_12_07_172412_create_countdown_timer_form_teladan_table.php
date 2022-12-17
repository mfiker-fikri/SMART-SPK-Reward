<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountdownTimerFormTeladanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countdown_timer_form_teladan', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time_open_form_teladan');
            $table->dateTime('date_time_expired_form_teladan')->nullable();
            $table->boolean('status_open');
            $table->boolean('status_expired')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countdown_timer_form_teladan');
    }
}
