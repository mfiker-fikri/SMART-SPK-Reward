<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalResultRewardTeladanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_result_reward_teladan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //
            $table->uuid('reward_teladan_id');
            $table->foreign('reward_teladan_id')->references('id')->on('reward_teladan')->onDelete('cascade');
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
        Schema::dropIfExists('final_result_reward_teladan');
    }
}
