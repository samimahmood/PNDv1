<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionStoreRequest;
use App\Http\Resources\PromotionResource;
use App\Image;
use App\Promotion;
use App\Subcategory;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $pushNotifications = new \Pusher\PushNotifications\PushNotifications(array(
//            "instanceId" => "b87dd3c2-e611-4331-8eb1-8f9573f5dfb8",
//            "secretKey" => "A67889642D5BC76C45AFE4AD16580D5",
//        ));
//
//        $publishResponse = $pushNotifications->publish(
//            array("hello"),
//            array(
//                "fcm" => array(
//                    "notification" => array(
//                        "title" => "McDonald's",
//                        "body" => "2 Mc Chicken Meals Only Rs:495",
//                    ),
//                    "data" => array(
//                        "myMessagePayload" => "Display me somewhere in the app ui!",
//                    ),
//                ),
//            )
//);
//
//        $publishResponse = $pushNotifications->publish(
//            array("hello"),
//            array(
//                "fcm" => array(
//                    "notification" => array(
//                        "title" => "Hashery",
//                        "body" => "Lunch Offer 20% Off 12pm to 4pm",
//                    ),
//                    "data" => array(
//                        "isMyPushNotification" => true,
//                    ),
//                ),
//            )
//        );


        $user = Auth::user()->id;

        $promotions = Promotion::where([
            ["user_id", $user],
            ['end' , '>' , Carbon::now('Asia/Karachi') ]
        ])->get();

//        $promotions = Promotion::all()->where( 'end' ,'>' , Carbon::now()->addHour() );

        return view ( 'vendor.promotion.home', compact('promotions') );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->category_id == null)
        {
//            return redirect(route('profile.edit'));
            return redirect('/home');

        }

        else {

            $category_id = Auth::user()->category_id;
            $subcategories = Subcategory::where('category_id', $category_id)->pluck('name', 'id')->all();
            return view('vendor.promotion.create', compact('subcategories'));

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();


        $start_date = $request->start_date;
        $start_time= $request->start_time;

        $end_date = $request->end_date;
        $end_time= $request->end_time;



        $start= $start_date. " " . $start_time;

        $end= $end_date. " " . $end_time;


        $input['end'] = $end;
        $input['start'] = $start;


        $user = Auth::user();
        $category_id = Auth::user()->category_id;

        $input['category_id'] = $category_id;

        if ($file = $request->file('image'))
        {
            $name = $file->getClientOriginalName();

            $file->move('images' , $name);

//            $photo = Image::create(['file' => $name]);

            $input['image'] = $name;
        }



        if( $request->has('promo_code') ){

            $promo = $this->generateRandomString();

            $input['promo_code'] = $promo;

        }else{

            $input['promo_code'] = null;
        }


        $user->promotions()->create($input);

        $user = Auth::user()->name;

        $pushNotifications = new \Pusher\PushNotifications\PushNotifications(array(
            "instanceId" => "b87dd3c2-e611-4331-8eb1-8f9573f5dfb8",
            "secretKey" => "A67889642D5BC76C45AFE4AD16580D5",
        ));

        $publishResponse = $pushNotifications->publish(
            array("hello"),
            array(
                "fcm" => array(
                    "notification" => array(
                        "title" => "Khaadi is within 2km with exciting offers" ,
                        "body" => "Tap to view Discounts",
                    ),
                    "data" => array(
                        "myMessagePayload" => "Display me somewhere in the app ui!",
                    ),
                ),
            )
        );

         return redirect(route('promotion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promotion = Promotion::findorFail($id);
        return view('vendor.promotion.edit' , compact('promotion' ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionStoreRequest $request, $id)
    {
        $promotion = Promotion::findOrFail($id);

        $input = $request->all();

        $start_date = $request->start_date;
        $start_time= $request->start_time;

        $end_date = $request->end_date;
        $end_time= $request->end_time;



        $start= $start_date. " " . $start_time;

        $end= $end_date. " " . $end_time;


        $input['end'] = $end;
        $input['start'] = $start;

        if ($file = $request->file('image'))
        {
            $name = time() . $file->getClientOriginalName();

            $file->move('images' , $name);

//            $photo = Image::create(['file' => $name]);

            $input['image'] = $name;
        }

//        if ($file = $request->file('image_id')) {
//            $name = time() . $file->getClientOriginalName();
//
//            $file->move('images', $name);
//
//            $photo = Image::create(['file' => $name]);
//
//            $input['image_id'] = $photo->id;
//        }

        $promotion->update($input);
        return redirect(route('promotion.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promotion = Promotion::findOrFail($id);
        $promotion->delete();
        session()->flash('deleted' , 'Promotion has been deleted');

        return redirect(route('promotion.index'));
    }

    public function indexApi($vendor)
    {


        $vendorId = User::where("name", '=', $vendor)->pluck('id');

        if ($vendorId->count())
        {

            $promotionVendor = PromotionResource::collection(Promotion::where([
                ['user_id', '=', $vendorId],
                ['end' , '>' , Carbon::now('Asia/Karachi') ]
            ])->get());

            return $promotionVendor;

//            if ($promotionVendor->count())
//            {
//                return $promotionVendor;
//            }

        }
//        $promotions = Promotion::all();
//

//        return response()->json(
//            $promotions,
//            200
//        );
    }

    public function showApi(Promotion $promotion)
    {
        return response()->json(array(
            $promotion),
            200
        );
    }

    public function showRecentApi()
    {

//        $recent = Promotion::orderBy('created_at', 'desc')->get();
//        return PromotionResource::collection(Promotion::orderBy('created_at', 'desc')->get());
        return PromotionResource::collection(Promotion::latest()->get());


    }


    public function indexAllApi()
    {

        $promotionVendor = PromotionResource::collection(Promotion::where([
            ['end', '>', Carbon::now('Asia/Karachi')]
        ])->orderBy('likes', 'desc')->get());


        return $promotionVendor;
    }



    public function addLike($promotionId)
    {



        $promotionLike = Promotion::find($promotionId)->likes;
        $promotionLike = $promotionLike +1;

//        return $promotionLike;

        $promotion = Promotion::find( $promotionId);

        if($promotion) {

            $promotion->likes = $promotionLike;
            $promotion->save();
        }

        return response()->json(array(
            $promotion),
            200
        );

//       return $promotion = Promotion::find( $promotionId);

    }


    public function mostLiked()
    {
        $promotionVendor = PromotionResource::collection(Promotion::where([
            ['end', '>', Carbon::now('Asia/Karachi')]
        ])->get());
    }



    public function showTrashed()
    {

        $user = Auth::user()->id;

        $promotions = Promotion::onlyTrashed()
            ->where([
            ["user_id", $user],
            ['end' , '>' , Carbon::now('Asia/Karachi') ]
        ])->get();

//        $promotions = Promotion::all()->where( 'end' ,'>' , Carbon::now()->addHour() );

        return view ( 'vendor.promotion.trash', compact('promotions') );

    }

    public function lastFiveDays()
    {


        $promotionVendor = PromotionResource::collection(Promotion::where([
            ['end', '<', Carbon::create(2018, 5, 19, 00, 0, 0 , 'Asia/Karachi')]
        ])->orderBy('likes', 'desc')->get());


        return $promotionVendor;
    }


    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}
