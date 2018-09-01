<?php

namespace App\Http\Resources;

use App\User;
use Illuminate\Http\Resources\Json\Resource;

class VendorResource extends Resource
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


                'id' => $this->id ,

                'name'=> $this->name ,

                'shortdesc' => "Tap To View Promotions",


                'image'=> "http://192.168.144.50:80/images/".$this->image ,

                'banner'=> "http://192.168.144.50:80/images/".$this->banner ,

//                'image' => $this->when($this->imageFile(), function () {
//                    return "http://192.168.101.50:80/images/".$this->image->file;
//                }),

                'category' => $this->when($this->categoryExists(), function () {
                    return $this->category->name;
                }),

                'rating'=> $this->rating ,

                'website'=> $this->website ,



            ];




//        return parent::toArray($request);
    }
}
