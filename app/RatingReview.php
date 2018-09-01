<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingReview extends Model
{
    protected $fillable = [
        'user_id', 'end_user_id', 'body','rating_value'
    ];
}
