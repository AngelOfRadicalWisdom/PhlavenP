<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserExams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userexams', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('exam_ID')->primary();
            $table->uuid('user_ID');
            $table->String('examtype',20);
            $table->uuid('tableofspecs_ID');
            $table->dateTime('datecreated');
            $table->integer('score');
            $table->boolean('status');
            $table->uuid('token');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userexams');
    }
}
