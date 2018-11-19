<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offer_name');
            $table->string('offer_image')->nullable();
            $table->longText('offer_description')->nullable();
            $table->integer('offer_status');
            $table->float('offer_price');
            $table->string('offer_duration')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('item_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('admins');
            $table->foreign('item_id')->references('id')->on('items');
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
        Schema::dropIfExists('offers');
    }
}
