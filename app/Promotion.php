<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model

{

    use SoftDeletes;



    protected $fillable = [
        'title', 'description',  'image', 'category_id' , 'subcategory_id',
        'start_date' , 'end_date' , 'start', 'end', 'start_time' , 'end_time','promo_code' ,'likes'
    ];

    protected $dates = ['start' , 'end' , 'deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

//    public function image()
//    {
//        return $this->belongsTo('App\Image');
//    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
