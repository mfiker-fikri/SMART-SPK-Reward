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
        Schema::create('final_result_reward_representative', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //
            $table->uuid('reward_representative_id');
            $table->foreign('reward_representative_id', 'rr_id')->references('id')->on('reward_representative')->onDelete('cascade');
            //
            $table->string('score_final_result', 255);
            $table->string('score_final_result_description', 255);
            //
            $table->string('signature_head_of_the_human_resources_bureau', 255)->nullable();
            $table->string('name_head_of_the_human_resources_bureau', 255)->nullable();
            $table->integer('verify_head_of_the_human_resources_bureau')->nullable()->default(1);
            //
            $table->string('signature_head_of_disciplinary_awards_and_administration', 255)->nullable();
            $table->string('name_head_of_disciplinary_awards_and_administration', 255)->nullable();
            $table->integer('verify_head_of_disciplinary_awards_and_administration')->nullable()->default(1);
            //
            $table->string('signature_head_of_rewards_discipline_and_pension_subdivision', 255)->nullable();
            $table->string('name_head_of_rewards_discipline_and_pension_subdivision', 255)->nullable();
            $table->integer('verify_head_of_rewards_discipline_and_pension_subdivision')->nullable()->default(1);
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
        Schema::dropIfExists('final_result_reward_representative');
    }
}
