<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criterias', function (Blueprint $table) {
            $table->id();
            $table->string('criteria');
            $table->string('value_quality');
            $table->string('normalization')->nullable();
            // 
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            // $table->foreignId('categorie_id')
            //     ->constrained();
            // $table->foreignId('kategori_id')
            // ->constrained('categories');
            // $table->foreign('categories_id')
            //     ->references('id')
            //     ->on('categories');
            // ->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            // $table->foreign('category_id')
            //     ->references('id')
            //     ->on('categories');
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
        Schema::dropIfExists('criterias', function (Blueprint $table) {
            $table->id();
            $table->string('criteria');
            $table->string('value_quality');
            $table->string('normalization')->nullable();
            // 
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            // $table->foreignId('categorie_id')
            //     ->constrained();
            // $table->foreignId('kategori_id')
            // ->constrained('categories');
            // $table->foreign('categories_id')
            //     ->references('id')
            //     ->on('categories');
            // ->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade');
            // $table->foreign('category_id')
            //     ->references('id')
            //     ->on('categories');
            // 
            $table->integer('status_active')->default(1);
            $table->integer('status_id')->default(1);
            // $table->timestamps();
        });
    }
}
