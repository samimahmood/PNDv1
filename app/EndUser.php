<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EndUser extends Model
{
    protected $fillable = [
        'name', 'email'
    ];
    public function subscriptions(){
        return $this->hasMany('App\Subscription');
    }
}
