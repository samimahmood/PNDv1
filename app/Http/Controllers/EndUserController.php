<?php

namespace App\Http\Controllers;

use App\EndUser;
use Illuminate\Http\Request;

class EndUserController extends Controller
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
        $end_user = EndUser::create($request->all());

        return response()->json($end_user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EndUser  $endUser
     * @return \Illuminate\Http\Response
     */
    public function show(EndUser $endUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EndUser  $endUser
     * @return \Illuminate\Http\Response
     */
    public function edit(EndUser $endUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EndUser  $endUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EndUser $endUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EndUser  $endUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(EndUser $endUser)
    {
        //
    }
}
