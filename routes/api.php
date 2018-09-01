<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => 'auth:api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes
});


Route::get('/vendors/{category}' , 'VendorProfileController@VendorsApi');


Route::get('/vendors/location/nearby' , 'VendorProfileController@VendorsNearbyApi');

Route::get('/vendor/user/subscriptions/{end_user_id}' , 'SubscriptionController@subscriptionApi');


Route::get('/promotions/all', 'PromotionController@indexAllApi');


Route::get('/promotions/{vendor}', 'PromotionController@indexApi');

Route::get('/promotion/{promotion}', 'PromotionController@showApi');

Route::post('/vendor/subscribe', 'SubscriptionController@subscribe');

Route::get('/vendor', 'VendorProfileController@infoApi');

Route::get('/vendor/{user}', 'VendorProfileController@showApi');



Route::post('/review', 'ReviewController@store');

Route::post('/rating', 'RatingController@store');

Route::post('/ratingreview', 'RatingReviewController@store');

Route::post('/enduser', 'EndUserController@store');




Route::get('/image', 'VendorProfileController@imageApi');

Route::get('/search/{search}', 'SearchController@search');

Route::get('recent', 'PromotionController@showRecentApi');

Route::get('promotions/mostrated', 'RatingController@showHighRatedApi');

Route::get('vendors/high/rated', 'VendorProfileController@highRatedApi');


Route::get('/rated', 'PromotionController@showRatedApi');

Route::get('/rating', 'RatingReviewController@rating');


Route::get('/nearby', 'LocationController@nearby');

Route::get('/get/directions/{user_id}', 'LocationController@directions');


Route::post('/subscribe', 'SubscriptionController@store');


Route::get('/addlike/{promotionId}', 'PromotionController@addLike');

Route::get('/last/five/promotions', 'PromotionController@lastFiveDays');



