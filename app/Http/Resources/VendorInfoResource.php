<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class VendorInfoResource extends Resource
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
            'name'=> $this->name ,
            'email'=>$this->email,
            'image'=>"http://10.0.2.2:8000/images/".$this->image->file,
            'category_id'=>$this->category->name,

        ];
    }

}
