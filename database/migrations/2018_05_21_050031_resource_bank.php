<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResourceBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resourcebank', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('resource_ID')->primary();
            $table->uuid('lesson_ID');
            $table->String('resource',255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resourcebank');
    }
}
