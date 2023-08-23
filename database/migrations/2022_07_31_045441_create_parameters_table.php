<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            //
            $table->unsignedBigInteger('criteria_id');
            $table->foreign('criteria_id')->references('id')->on('criterias');
            //
            $table->string('parameter', 255);
            $table->string('grade', 255);
            // $table->foreignId('kriteria_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
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
        Schema::dropIfExists('parameters', function (Blueprint $table) {
            $table->id();
            $table->text('parameter');
            $table->string('grade');
            //
            $table->unsignedBigInteger('criteria_id');
            $table->foreign('criteria_id')->references('id')->on('criterias');
            // $table->foreignId('kriteria_id')
            //     ->constrained()
            //     ->onUpdate('cascade')
            //     ->onDelete('cascade');
            //
            $table->integer('status_active')->default(1);
            $table->integer('status_id')->default(1);
            // $table->timestamps();
        });
    }
}
