<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('lesson_ID')->primary();
            $table->String('lesson_name',50);
            $table->uuid('chapter_ID');
            $table->uuid('revcenter_ID');
            $table->String('lessondesc',255);
            $table->uuid('parent_ID')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leassons');
    }
}
