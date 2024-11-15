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
        Schema::create('countdown_timer_representative', function (Blueprint $table) {
            $table->id();
            // $table->dateTime('date_time_open_form_teladan')->nullable();
            // $table->dateTime('date_time_expired_form_teladan')->nullable();
            // $table->boolean('status_open')->nullable();
            // $table->boolean('status_expired')->nullable();
            //
            $table->uuid('hr_id');
            $table->foreign('hr_id')->references('id')->on('human_resources');
            //
            //
            $table->dateTime('date_time_open_appraisement')->nullable();
            $table->dateTime('date_time_expired_appraisement')->nullable();
            $table->boolean('status_open_appraisement')->nullable();
            $table->boolean('status_expired_appraisement')->nullable();
            //
            $table->dateTime('date_time_open_signature_human_resource_1')->nullable();
            $table->dateTime('date_time_expired_signature_human_resource_1')->nullable();
            $table->boolean('status_open_signature_human_resource_1')->nullable();
            $table->boolean('status_expired_signature_human_resource_1')->nullable();
            //
            $table->dateTime('date_time_open_signature_human_resource_2')->nullable();
            $table->dateTime('date_time_expired_signature_human_resource_2')->nullable();
            $table->boolean('status_open_signature_human_resource_2')->nullable();
            $table->boolean('status_expired_signature_human_resource_2')->nullable();
            //
            $table->dateTime('date_time_open_signature_human_resource_3')->nullable();
            $table->dateTime('date_time_expired_signature_human_resource_3')->nullable();
            $table->boolean('status_open_signature_human_resource_3')->nullable();
            $table->boolean('status_expired_signature_human_resource_3')->nullable();
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
