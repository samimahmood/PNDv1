<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'name', 'category_id'
    ];
    public function promotion(){
        return $this->belongsTo('App\Promotion');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
