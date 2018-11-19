<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_activated',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //a user has many posts
    public function posts(){
        return $this->hasMany('App\Post');
    }

    //a user has many comments
    public function comments(){
        return $this->morphMany('App\Comment', 'commentable');
    }
    
    // //a user has many payments
    // public function payments(){
    //     return $this->hasMany('App\Payment');
    // }
    // //a user has many orders
    // public function orders(){
    //     return $this->hasMany('App\Order');
    // }
    // //a user has many bookings
    // public function bookings(){
    //     return $this->hasMany('App\Booking');
    // }
}
