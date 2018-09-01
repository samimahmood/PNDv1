<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware

//    });

    Route::resource('/vendor/profile' , 'VendorProfileController');
    Route::resource('promotion', 'PromotionController');
    Route::resource('/location' , 'LocationController');
    Route::resource('/analytic' , 'AnalyticController');

    Route::get('/trash/promotions' , 'PromotionController@showTrashed')->name('promotions.trash');





    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::prefix('admin')->group(function ()

{

    Route::get('/login' , 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login' , 'Auth\AdminLoginController@Login')->name('admin.login.submit');
    Route::get('/' , 'AdminController@index')->name('admin.dashboard');


    Route::resource('/user' , 'AdminUsersController');

    Route::resource('/promotion' , 'AdminPromotionController', ['names' => [
        'index' => 'admin.promotion.index'  , 'create' => 'admin.promotion.create' , 'edit' => 'admin.promotion.edit' ,
        'store' => 'admin.promotion.store' , 'update' => 'admin.promotion.update' , 'destroy' => 'admin.promotion.destroy' ]]);

    Route::resource('/category' , 'AdminCategoryController');
    Route::resource('/subcategory' , 'AdminSubcategoryController');



});