<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountdownTimerFormInovationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countdown_timer_inovation', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_time_open_form_inovation')->nullable();
            $table->dateTime('date_time_expired_form_inovation')->nullable();
            $table->boolean('status_open')->nullable();
            $table->boolean('status_expired')->nullable();
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
            // $table->softDeletes();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countdown_timer_form_inovation');
    }
}
