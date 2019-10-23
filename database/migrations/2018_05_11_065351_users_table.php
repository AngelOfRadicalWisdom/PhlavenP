<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           // $table->increments('id');
            // $table->timestamps();
            $table->uuid('user_ID')->primary();
            $table->uuid('mobile_token');
            $table->string('username',100)->unique();
            $table->string('password',255);
            $table->string('email',50)->unique();
            $table->string('firstname',255);
            $table->string('lastname',255);
            $table->string('gender');
            $table->boolean('isadmin');
            $table->boolean('diagnostic');
            $table->string('remember_token', 100)->nullable();
            //$table->timestamps(); 
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
