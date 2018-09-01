<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name' , 'lat' , 'lng'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
