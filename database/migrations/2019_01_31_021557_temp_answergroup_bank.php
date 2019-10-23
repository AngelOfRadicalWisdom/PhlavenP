<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempAnswergroupBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempanswergroupbank', function (Blueprint $table) {
            $table->uuid('tempanswergroup_ID',20)->primary();
            $table->uuid('tempsubquestion_ID',20)->nullable();
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
        Schema::dropIfExists('tempanswergroupbank');
    }
}
