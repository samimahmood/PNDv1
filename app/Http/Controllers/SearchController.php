<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Resources\PromotionResource;
use App\Promotion;
use App\Subcategory;
use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
//    public function show(Vendor $vendor)
//    {
//        return response()->json(array(
//            'status' => 'success',
//            'pages' => $vendor->toArray()),
//            200
//        );
//    }
    public function search($search)
    {

        $promotion = PromotionResource::collection( Promotion::where("title","=",$search)->get() );

        if ($promotion->count())
        {
            return $promotion;
        }


        $categoryId = Category::where("name", '=', $search)->pluck('id');

        if ($categoryId->count())
        {


            $promotionCat = PromotionResource::collection(Promotion::where('category_id', '=', $categoryId)->get());

            if ($promotionCat->count())
            {
                return $promotionCat;
            }

        }

        $subcategoryId = Subcategory::where("name" , '=' ,$search)->pluck('id');

        if ($subcategoryId->count())
        {
            $promotionSubcategory = PromotionResource::collection( Promotion::where('subcategory_id', '=' , $subcategoryId)->get() );

            if ($promotionSubcategory->count())
            {
                return $promotionSubcategory;
            }
        }

        $vendorId = User::where("name",  'like','%'. $search .'%')->pluck('id');

        if ($vendorId->count())
        {

            $promotionVendor = PromotionResource::collection(Promotion::where('user_id', '=', $vendorId)->get());

            if ($promotionVendor->count())
            {
                return $promotionVendor;
            }

        }

        return "Noting";

    }
}

