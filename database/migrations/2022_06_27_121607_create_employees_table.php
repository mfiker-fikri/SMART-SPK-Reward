<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('full_name', 255);
            $table->string('email', 255)->unique()->index();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('username', 255)->unique()->index();
            $table->string('password', 255);
            //
            $table->string('photo_profile', 255)->nullable();
            $table->string('place_birth', 255)->nullable();
            $table->date('date_birth')->nullable();
            //
            $table->string('nip', 255)->nullable()->unique()->index();
            $table->string('pendidikan_terakhir', 255)->nullable();
            $table->string('pangkat', 255)->nullable();
            $table->string('golongan_ruang', 255)->nullable();
            $table->string('sk_cpns', 255)->nullable();
            $table->string('jabatan_terakhir', 255)->nullable();
            $table->string('unit_kerja', 255)->nullable();
            //
            $table->uuid('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
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
        Schema::dropIfExists('employees');
    }
}
