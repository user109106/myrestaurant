<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'sid',
        'item_id',
        'item_name',
        'price',
        'quantity',
        'image',
    ];
}
