<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserLearningPath extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userlearningpath', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->string('user_ID');
            $table->string('learningpath_ID');
            $table->boolean('status');
            $table->uuid('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userlearningpath');
    }
}
