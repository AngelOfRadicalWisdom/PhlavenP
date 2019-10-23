<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LearningPathNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learningpathnodes', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('learningpathnode_ID')->primary();
            $table->uuid('learningpath_ID');
            $table->uuid('chapter_ID');
            $table->uuid('parent_ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learningpathnodes');
    }
}
