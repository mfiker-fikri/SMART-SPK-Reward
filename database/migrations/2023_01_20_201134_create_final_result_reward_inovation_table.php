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
            $table->uuid('reward_inovation_id');
            $table->foreign('reward_inovation_id')->references('id')->on('reward_inovation')->onDelete('cascade');
            //
            $table->string('score_final_result');
            $table->string('score_final_result_description');
            //
            $table->string('signature_head_of_the_human_resources_bureau')->nullable();
            $table->string('verify_head_of_the_human_resources_bureau')->nullable();
            //
            $table->string('signature_head_of_disciplinary_awards_and_administration')->nullable();
            $table->string('verify_head_of_disciplinary_awards_and_administration')->nullable();
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
