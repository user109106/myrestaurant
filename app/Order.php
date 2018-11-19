<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id',
        'payment_id',
        'shipping_id',
        'order_status',
        'order_total',
    ];

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
    public function orderdetails(){
        return $this->hasMany('App\Orderdetail');
    }
    // an order has one payment - one to one relationship
    public function payments(){
        return $this->hasOne('App\Payment');
    }
}
