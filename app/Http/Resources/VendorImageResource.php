<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class VendorImageResource extends Resource
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
            'file'=> $this->file
        ];

    }
}
