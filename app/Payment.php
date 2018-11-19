<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = [
        'payment_method',
        'payment_status',
        'payment_total',
        'user_id',
        'sid',
        'tid',
    ];

    public function users(){
        return $this->hasOne('App\User');
    }
}
