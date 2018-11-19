<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');
            $table->float('item_price');
            $table->string('item_image')->nullable();
            $table->longText('item_description');
            $table->integer('item_cat_id')->unsigned();
            $table->integer('item_availability');
            $table->integer('user_id')->unsigned();

            $table->foreign('item_cat_id')->references('id')->on('itemcategories');
            $table->foreign('user_id')->references('id')->on('admins');
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
        Schema::dropIfExists('items');
    }
}
