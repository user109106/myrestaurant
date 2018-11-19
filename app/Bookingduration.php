<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookingduration extends Model
{
    //
    protected $fillable = [
        'booking_duration',
        'booking_amount',
    ];
}
