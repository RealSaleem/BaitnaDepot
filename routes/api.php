<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::post('join_vendor_request', 'API\AuthController@JoinVendorRequest');
Route::get('contact_us_details','API\PageController@GetContactUsDetails');
Route::get('contact_us_details','API\PageController@GetContactUsDetails');
//------------------>ContactUs Messages------------------->
Route::post('contact_us_message','API\PageController@contact_us_message');
//------------------>Privacy Policy----------------------->
Route::get('get_page/{type}','API\PageController@getPageByType');
//------------------>Advertisment----------------------->
Route::get('get_Advertisement','API\PageController@getAdvertisementBanner');


Route::apiResource('address', 'API\AddressController');

Route::group(['prefix' => 'auth'], function(){
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@register');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('profile', 'API\UserController@profile');
        Route::post('update_profile', 'API\UserController@updateProfile');
        Route::post('update_password', 'API\AuthController@updatePassword');
        Route::apiResource('address', 'API\AddressController');
    });
});
