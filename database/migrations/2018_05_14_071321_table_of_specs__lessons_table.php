<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableOfSpecsLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tableofspecslesson', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('tableofspecs_ID');
            $table->uuid('lesson_ID');
            $table->integer('questionsnumber');
            $table->integer('timer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tableofspecslesson');
    }
}
