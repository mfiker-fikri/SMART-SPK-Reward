<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalResultRewardInovationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_result_reward_inovation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //
            $table->uuid('employees_id');
            $table->foreign('employees_id')->references('id')->on('employees')->onDelete('cascade');
            //
            $table->uuid('reward_inovation_id');
            $table->foreign('reward_inovation_id')->references('id')->on('reward_inovation')->onDelete('cascade');
            //
            $table->string('score_final_result');
            $table->string('score_final_result_ranking');
            $table->string('score_final_result_description');
            //
            $table->integer('status_id')->default(1);
            //
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
        Schema::dropIfExists('final_result_reward_inovation');
    }
}
