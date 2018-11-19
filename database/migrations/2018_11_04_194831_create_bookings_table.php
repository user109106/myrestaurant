<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->integer('booking_type')->unsigned();
            $table->string('booking_for');
            $table->string('booking_time');
            $table->integer('booking_duration_id')->unsigned();
            $table->float('booking_paid_amount');
            $table->float('booking_due_amount');
            $table->integer('user_id')->unsigned();
            $table->string('payment_status');
            $table->string('contact_info');

            $table->foreign('booking_duration_id')->references('booking_duration_id')->on('bookingdurations');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('booking_type')->references('booking_type_id')->on('bookingtypes');
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
        Schema::dropIfExists('bookings');
    }
}
