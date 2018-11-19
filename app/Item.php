<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'item_name',
        'item_price',
        'item_image',
        'item_description',
        'item_cat_id',
        'item_availability',
        'item_status',
        'user_id',
    ];

    //an item belongs to many orderdetails
    public function orderdetails(){
        return $this->belongsToMany('App\Orderdetail');
    }
    public function itemcategories(){
        return $this->belongsTo('App\Itemcategory', 'item_cat_id');
    }
    
}
