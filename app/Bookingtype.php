<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookingtype extends Model
{
    //
    protected $fillable = [
        'booking_type',
        'booking_type_details',
    ];
}
