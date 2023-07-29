<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('matricule')->nullable();
            $table->string('cni');
            $table->date('fonction');
            $table->date('naissance');
            $table->string('photo');
            $table->string('password');
            $table->string('password_confirm');
            $table->string('status')->nullable();
//            $table->string('role_id');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
