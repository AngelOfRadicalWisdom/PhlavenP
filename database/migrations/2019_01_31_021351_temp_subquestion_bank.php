<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempSubquestionBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempsubquestionbank', function (Blueprint $table) {
            $table->uuid('tempsubquestion_ID',20)->primary();
            $table->uuid('tempquestion_ID',20)->nullable();
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
        Schema::dropIfExists('tempsubquestionbank');
    }
}
