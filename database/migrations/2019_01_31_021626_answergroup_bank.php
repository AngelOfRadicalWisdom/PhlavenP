<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnswergroupBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answergroupbank', function (Blueprint $table) {
            $table->uuid('answergroupID',20)->primary();
            $table->uuid('subquestion_ID',20)->nullable();
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
        Schema::dropIfExists('answergroupbank');
    }
}
