<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itemcategory extends Model
{
    //
    protected $fillable = [
        'item_category_name',
        'item_category_type',
        'item_category_status',
    ];

    public function items(){
        return $this->hasMany('App\Item');
    }
}
