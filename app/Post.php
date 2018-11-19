<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'post_title',
        'post_image',
        'post_body',
        'post_status',
        'author',
    ];

    //a post belongs to a single user
    public function posts(){
        return $this->belongsTo('App\User');
    }

    //polymorphic relationship with comments
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
}
