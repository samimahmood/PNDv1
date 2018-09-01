<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationResource;
use App\Http\Resources\PromotionResource;
use App\Http\Resources\VendorResource;
use App\Location;
use App\Promotion;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $locations = Location::where("user_id", $user)->get();
        return view('vendor.location.home', compact('locations'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $input = $request->all();

        $user->locations()->create($input);

        return redirect(route('location.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        return view('vendor.location.show' , compact('location'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }

    public function nearby()
    {

        $lat =  31.364667;
        $long = 74.216093;

        $user_id = 6;

        $nearby = DB::select(
            "
           
             SELECT  
             *, 
(
   6371 *
   acos(cos(radians($lat)) * 
   cos(radians(lat)) * 
   cos(radians(lng) - 
   radians($long)) + 
   sin(radians($lat)) * 
   sin(radians(lat )))
) AS distance 
FROM locations 
WHERE user_id = ($user_id)
HAVING distance < 50 
ORDER BY distance LIMIT 0, 20;
           
            "
        );

        return $nearby;

        $id_array = array();

        foreach ($nearby as $item)
        {
            array_push($id_array, $item->id);


        }

        $id = Location::whereIn('id', $id_array)->get();

        return LocationResource::collection($id);





        return $nearby;

        return LocationResource::collection($nearby);

    }


    public function directions($user_id)
    {

        $lat =  31.364667;
        $long = 74.216093;


        $nearby = DB::select(
            "
           
             SELECT *
             , 
(
   6371 *
   acos(cos(radians($lat)) * 
   cos(radians(lat)) * 
   cos(radians(lng) - 
   radians($long)) + 
   sin(radians($lat)) * 
   sin(radians(lat )))
) AS distance 
FROM locations 
WHERE user_id = ($user_id)
HAVING distance < 50 
ORDER BY distance LIMIT 0, 20;
           
            "
        );


        $id_array = array();

        foreach ($nearby as $item)
        {
            array_push($id_array, $item->id);


        }

        $id = Location::whereIn('id', $id_array)->get();

        return LocationResource::collection($id);





        return $nearby;

        return LocationResource::collection($nearby);



        return response()->json(array(
            $nearby),
            200
        );

//        return $nearby;
//
//        $id_array = array();
//
//        foreach ($nearby as $item)
//        {
//            array_push($id_array, $item->id);
//
//
//        }
//
//        $id = Location::whereIn('id', $id_array)->get();
//
//        return LocationResource::collection($id);

    }

}
