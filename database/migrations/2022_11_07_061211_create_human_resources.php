<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHumanResources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_resources', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('full_name', 255);
            $table->string('email', 100)->unique()->index();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('username', 100)->unique()->index();
            $table->string('password', 255);
            //
            $table->string('role', 100);
            //
            $table->string('photo_profile', 255)->nullable();
            //
            $table->timestamp('last_seen')->nullable();
            $table->rememberToken();
            $table->integer('status_active')->default(1);
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
        Schema::dropIfExists('human_resources');
    }
}
