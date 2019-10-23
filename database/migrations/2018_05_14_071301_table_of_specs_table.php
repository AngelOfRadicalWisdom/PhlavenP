<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableOfSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tableofspecs', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('tableofspecs_ID')->primary();
            $table->uuid('revcenter_ID');
            $table->String('type',20);
            $table->integer('timer')->nullable();
            $table->dateTime('datecreated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tableofspecs');
    }
}
