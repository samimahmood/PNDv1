<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\VendorProfileUpdateRequest;
use App\Http\Resources\VendorImageResource;
use App\Http\Resources\VendorInfoResource;
use App\Http\Resources\VendorResource;
use App\Image;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VendorProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $categories = Category::pluck('name' , 'id')->all();

        return view ('vendor.profile.edit' , compact('user' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VendorProfileUpdateRequest $request, $id)
    {

        if (trim($request->password) == '')
        {
            $input = $request->except('password');
        } else{
            $input = $request->all();

        }

        $user = User::findOrFail($id);


        if ($file = $request->file('image'))
        {
            $name = time() . $file->getClientOriginalName();

            $file->move('images' , $name);

//            $photo = Image::create(['file' => $name]);

            $input['image'] = $name;
        }

        if ($file = $request->file('banner'))
        {
            $name = time() . $file->getClientOriginalName();

            $file->move('images' , $name);

//            $photo = Image::create(['file' => $name]);

            $input['banner'] = $name;
        }


        $input['password'] = bcrypt($request->password);


//        dd($input);


        $user->update($input);



        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function infoApi()
    {

//        return VendorInfoResource::collection(User::all());
        return VendorInfoResource::collection(User::all());


    }
    public function showApi($id)
    {
        return new VendorInfoResource(User::find($id));

    }

    public function imageApi()
    {

        return VendorImageResource::collection(Image::all());

    }


    public function VendorsApi($category)
    {

        $category_id = Category::where('name', $category)->pluck('id');


        $vendor = User::where('category_id', $category_id)->get();




        return VendorResource::collection($vendor);

    }

    public function VendorsNearbyApi()
    {

        $lat =  31.364667;
        $long = 74.216093;


        $nearby = DB::select(
            "
           
             SELECT  
             user_id, 
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
HAVING distance < 15 
ORDER BY distance LIMIT 0, 20;
           
            "
        );


        $vendor_array = array();

        foreach ($nearby as $item)
        {
            array_push($vendor_array, $item->user_id);


        }

        $vendor = User::whereIn('id', $vendor_array)->orderBy('name')->get();

        return VendorResource::collection($vendor);

    }

    public function highRatedApi()
    {




        $vendor = User::orderBy('rating', 'desc')->get();




        return VendorResource::collection($vendor);

    }





}
