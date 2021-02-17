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
Route::post('join_vendor_request', 'API\AuthController@JoinVendorRequest');
/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */
Route::GET('contact_us_details','API\AddressController@index');


Route::group(['prefix' => 'auth'], function(){
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@register');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('profile', 'API\UserController@profile');
        Route::post('update_profile', 'API\UserController@updateProfile');
        Route::post('update_password', 'API\AuthController@updatePassword');
    });
});