<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChoiceBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choicebank', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('choice_ID')->primary();
            $table->uuid('question_ID');
            $table->text('choice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choicebank');
    }
}
