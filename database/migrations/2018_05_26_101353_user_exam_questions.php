<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserExamQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userexamquestions', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('exam_ID');
            $table->uuid('question_ID');
            $table->float('score');
            $table->boolean('correct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userexamquestions');
    }
}
