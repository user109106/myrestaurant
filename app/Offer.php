<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    //
    protected $fillable = [
        'offer_name',
        'offer_image',
        'offer_description',
        'offer_status',
        'offer_price',
        'offer_duration',
        'user_id',
        'item_id',
    ];

    public function item(){
        return $this->belongsTo('App\Item', 'item_id','id');
    }
}
