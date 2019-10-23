<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LearningPathNodeStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learningpathnodestatus', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('learningpathnodestatus_ID')->primary();
            $table->uuid('reviewee_ID');
            $table->uuid('learningpath_ID');
            $table->uuid('chapter_ID');
            $table->boolean('status');
            $table->integer('total');
            $table->boolean('progress');
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
        Schema::dropIfExists('learningpathnodestatus');
    }
}
