<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    //
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'city',
        'country',
        'total',
        'user_id',
        'sid',
    ];
    public function users(){
        return $this->belongsTo('App\User');
    }
}
