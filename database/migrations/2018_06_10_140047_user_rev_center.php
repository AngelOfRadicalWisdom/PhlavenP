<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRevCenter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userrevcenter', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->uuid('user_ID');
            $table->uuid('revcenter_ID');
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
        Schema::dropIfExists('userrevcenter');
    }
}
