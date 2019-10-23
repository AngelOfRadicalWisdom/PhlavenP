<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RevCenterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revcenter', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            
            $table->uuid('revcenter_ID')->primary();
            $table->string('revcenter_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revcenter');
    }
}
