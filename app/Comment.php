<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'comment_body',
        'user_id',
        'commentable_id',
        'commentable_type',
    ];
}
