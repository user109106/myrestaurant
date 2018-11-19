<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    //
    protected $fillable = [
        'order_id',
        'item_id',
        'item_name',
        'item_image',
        'unit_price',
        'item_qty',
        'subtotal',
        'ordertotal',
    ];

    //each orderdetails have a unique order id
    public function orders(){
        return $this->hasOne('App\Order');
    }
    
    //an orderdetail has many items
    public function items(){
        return $this->hasMany('App\Item');
    }
}
