<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempQuestionBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempquestionbank', function (Blueprint $table) {
            $table->uuid('tempquestion_ID',20)->primary();
            $table->integer('order');
            $table->String('type');
            $table->uuid('lesson_ID');
            $table->text('question');
            $table->String('correctanswer')->nullable();
            $table->integer('difficulty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempquestionbank');
    }
}
