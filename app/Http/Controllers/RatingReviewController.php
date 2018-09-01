<?php

namespace App\Http\Controllers;

use App\Rating;
use App\rating_review;
use App\RatingReview;
use App\User;
use Illuminate\Http\Request;

class RatingReviewController extends Controller
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
        $ratingReview = RatingReview::create($request->all());


        $user_id = $request->user_id;

        $this->rating($user_id);



        return response()->json($ratingReview, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\rating_review  $rating_review
     * @return \Illuminate\Http\Response
     */
    public function show(rating_review $rating_review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\rating_review  $rating_review
     * @return \Illuminate\Http\Response
     */
    public function edit(rating_review $rating_review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\rating_review  $rating_review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, rating_review $rating_review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\rating_review  $rating_review
     * @return \Illuminate\Http\Response
     */
    public function destroy(rating_review $rating_review)
    {
        //
    }


    public function rating($id)
    {

        $userId = $id;

        $count = Rating::where([
            ["user_id", $userId]
        ])->count();

        $sum = Rating::where([
            ["user_id", $userId]
        ])->sum('rating_value');

        $rating = round($sum/$count) ;





        $updateRating = User::find($userId);

        $updateRating->rating = $rating;

        $updateRating->save();


//        echo "sum: " .$sum. "  count: " . $count . "  Rating: ". $rating ;

    }

}
