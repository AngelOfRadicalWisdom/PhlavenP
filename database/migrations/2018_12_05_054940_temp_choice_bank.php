<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempChoiceBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempchoicebank', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('tempchoice_ID')->primary();
            $table->String('choiceorder',10);
            $table->uuid('tempquestion_ID');
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
        Schema::dropIfExists('tempchoicebank');
    }
}
