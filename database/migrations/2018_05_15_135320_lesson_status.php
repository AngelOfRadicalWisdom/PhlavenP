<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LessonStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessonstatus', function (Blueprint $table) {
            $table->uuid('reviewee_ID');
            $table->uuid('learningpath_ID');
            $table->uuid('lesson_ID');
            $table->boolean('status');
            $table->uuid('reviewee_token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessonstatus');
    }
}
