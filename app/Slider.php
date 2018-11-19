<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable = [
        'slider_name',
        'slider_title',
        'slider_image',
        'publication_status',
    ];
}
