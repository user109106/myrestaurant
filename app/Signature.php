<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    //
    protected $fillable = [
        'signature_name',
        'signature_price',
        'signature_details',
        'signature_image',
    ];
}
