<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'event_namme',
        'event_image',
        'event_description',
        'event_status',
        'event_from',
        'event_to',
        'user_id',
    ];

    public function admins(){
        return $this->belongsTo('App\Admin');
    }
}
