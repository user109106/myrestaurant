<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    protected $fillable = [
        'booking_type',
        'booking_for',
        'booking_time',
        'booking_duration_id',
        'booking_paid_amount',
        'booking_due_amount',
        'user_id',
        'payment_status',
        'contact_info',
    ];

    public function users(){
        return $this->belongsTo('App\User');
    }
    public function bookingtypes(){
        return $this->hasOne('App\Bookingtype');
    }
    public function bookingdurations(){
        return $this->hasOne('App\Bookingduration');
    }
}
