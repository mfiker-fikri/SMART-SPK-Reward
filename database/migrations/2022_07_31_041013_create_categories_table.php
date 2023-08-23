<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            // $table->bigIncrements('id');
            $table->id();
            //
            // $table->uuid('hr_id');
            // $table->foreign('hr_id')->references('id')->on('human_resources');
            //
            $table->string('category', 255);
            //
            $table->integer('status_active')->default(1);
            $table->integer('status_id')->default(1);
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
        Schema::dropIfExists('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            //
            $table->integer('status_active')->default(1);
            $table->integer('status_id')->default(1);
            // $table->timestamps();
        });
    }
}
