<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'name', 'email', 'password','category_id','image', 'status' , 'banner' , 'rating' , 'contact' , 'website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function promotions()
    {
        return $this->hasMany('App\Promotion');
    }

    public function locations ()
    {
        return $this->hasMany('App\Location');
    }

//    public function image(){
//        return $this->belongsto('App\Image');
//    }

    public function subscriptions(){
        return $this->hasMany('App\Subscription');
    }

    public function imageFile()
    {
        if ($this->image)
        {
            return true;
        }
        else
            return false;
    }

    public function categoryExists()
    {
        if ($this->category)
        {
            return true;
        }
        else
            return false;
    }

    public function promotionsExits()
    {
        if ($this->promotions())
        {
            return true;
        }
        else
            return false;
    }

}
