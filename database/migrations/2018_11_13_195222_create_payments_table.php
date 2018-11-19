<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!schema::hasTable('payments')){
            Schema::create('payments', function (Blueprint $table) {
                $table->increments('id');
                $table->string('payment_method');
                $table->integer('payment_status');
                $table->float('payment_total');
                $table->integer('user_id')->unsigned();
                $table->string('sid');
                $table->integer('tid');

                $table->foreign('user_id')->references('id')->on('users');
                $table->timestamps();
            });
        }else{
            Schema::table('payments', function (Blueprint $table) {
                $table->string('sid');
                $table->integer('tid');
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
        Schema::dropIfExists('payments');
    }
}
