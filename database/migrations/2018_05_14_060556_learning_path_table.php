<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LearningPathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learningpath', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('learningpath_ID')->primary();
            $table->uuid('revcenter_ID');
            $table->dateTime('createdat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('learningpath');
    }
}
