<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\Resource;

class PromotionResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id'=>$this->id,
            'vendor_id'=>$this->user->id,
            'title'=> $this->title ,
            'description'=>$this->description,
            'vendor'=>$this->user->name,
            'start_date'=>$this->start->diffForHumans(),
            'end_date'=>$this->end->diffForHumans(),
            'image'=>"https://pnd-beta.herokuapp.com/images/".$this->image,
            'category'=>$this->user->category->name,
            'likes' => $this->likes

        ];

//        return parent::toArray($request);
    }
}
