<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!schema::hasTable('shipments')){
            Schema::create('shipments', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('phone');
                $table->string('email');
                $table->longText('address');
                $table->string('city')->nullable();
                $table->string('country')->nullable();
                $table->float('total');
                $table->integer('user_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }else{
            Schema::table('shipments', function (Blueprint $table) {
                $table->string('sid');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
