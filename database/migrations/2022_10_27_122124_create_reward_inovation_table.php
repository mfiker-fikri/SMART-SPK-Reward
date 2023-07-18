<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardInovationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_innovation', function (Blueprint $table) {
            $table->uuid('id')->primary();
            //
            $table->string('upload_file_short_description', 250);
            $table->string('upload_file_image_support', 250);
            $table->string('upload_file_video_support', 250);
            //
            $table->uuid('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');
            //
            // 0 = ditolak, 1=dikembalikan , 2=menunggu, 3=Masuk ke Tahap Penilaian, 4=Selesai Di Nilai
            $table->integer('status_process')->default(2);
            $table->string('description_back', 255)->nullable();
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
        Schema::dropIfExists('reward_inovation');
    }
}
