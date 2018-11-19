<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        'service_title',
        'service_details',
        'service_status',
        'service_image',
    ];
}
