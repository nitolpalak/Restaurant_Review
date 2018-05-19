<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offer');
            $table->dateTime('starts');
            $table->dateTime('ends');
            $table->integer('uid');
            $table->integer('rid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('new_offers');
    }
}
