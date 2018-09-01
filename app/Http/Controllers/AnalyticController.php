<?php

namespace App\Http\Controllers;

use App\Promotion;
use App\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnalyticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;

        $user_name = Auth::user()->name;


        $RunningPromotionsCount = Promotion::where([
            ["user_id", $user],
            ['end' , '>' , Carbon::now('Asia/Karachi') ]
        ])->count();

        $TotalSubscriptionsCount = Subscription::where([
            ["user_id", $user]
        ])->count();

        $TotalPromotionsCount = Promotion::where([
            ["user_id", $user]
        ])->count();

        $TotalLikesCount = Promotion::where([
            ["user_id", $user]
        ])->sum('likes');

        $TotalPayment = $TotalLikesCount * 0.50;


        return view ( 'vendor.analytics.home',
            compact(
                'RunningPromotionsCount' ,
            'TotalPromotionsCount',
                'user_name',
                'TotalLikesCount',
                'TotalPayment',
                'TotalSubscriptionsCount'
            ));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
