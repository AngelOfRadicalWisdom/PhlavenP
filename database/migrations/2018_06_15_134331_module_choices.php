<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModuleChoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modulechoices', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('modulechoice_ID')->primary();
            $table->uuid('modulequestion_ID');
            $table->string('choice');
            $table->string('response');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modulechoices');
    }
}
