<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardTeladanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_representative', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //
            // $table->string('upload_file_short_description');
            // $table->string('upload_file_image_support');
            // $table->string('upload_file_video_support');
            //
            $table->uuid('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->uuid('at_id');
            $table->foreign('at_id')->references('id')->on('team_assessments');
            //
            $table->unsignedBigInteger('categoryOption_id');
            $table->foreign('categoryOption_id')->references('id')->on('categories');
            //
            // 0 = ditolak, 1=dikembalikan , 2=menunggu, 3=diproses, 4=berhasil
            $table->integer('status_process');
            //
            $table->integer('score_valuation_1')->nullable();
            $table->integer('score_valuation_2')->nullable();
            $table->integer('score_valuation_3')->nullable();
            $table->integer('score_valuation_4')->nullable();
            $table->integer('score_valuation_5')->nullable();
            $table->integer('score_valuation_6')->nullable();
            //
            $table->integer('status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reward_representative');
    }
}
