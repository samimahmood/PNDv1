<?php

namespace App\Http\Controllers;

use App\Http\Resources\VendorResource;
use App\Subscription;
use App\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
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
        $user_id = $request->user_id;
        $end_user_id = $request->end_user_id;



        $result = Subscription::where([
            ['user_id', '=', $user_id],['end_user_id' , '=' , $end_user_id]
        ])->get();



        if ($result->count())
        {

            $id = Subscription::where([
                ['user_id', '=', $user_id],['end_user_id' , '=' , $end_user_id]
            ])->firstOrFail()->id;

            $subscription = Subscription::findOrFail($id);

            $subscription->delete();
            return "UNSUB";

        }


        else{
            $review = Subscription::create($request->all());
            return response()->json($review, 201);

        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }

    public function subscribe(Request $request){
        $subscribe = Subscription::create($request->all());

        return response()->json(array(
            'status' => 'success',
            'pages' => $subscribe->toArray()),
            200
        );
    }


    public function subscriptionApi($end_user_id)
    {

        $user_id = Subscription::where('end_user_id', $end_user_id)->pluck('user_id');


        $vendor = User::whereIn('id', $user_id)->get();




        return VendorResource::collection($vendor);

    }

}
