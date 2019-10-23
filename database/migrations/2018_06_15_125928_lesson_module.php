<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LessonModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessonmodule', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('lessonmodule_ID')->primary();
            $table->uuid('lesson_ID');
            $table->uuid('resource_ID')->nullable();
            $table->uuid('modulequestions_ID')->nullable();
            $table->integer('index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessonmodule');
    }
}
