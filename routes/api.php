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

Route::post('join_vendor_request', 'API\AuthController@joinVendorRequest');
Route::get('contact_us_details','API\PageController@getContactUsDetails');
// Route::get('contact_us_details','API\PageController@GetContactUsDetails');
//------------------>ContactUs Messages------------------->
Route::post('contact_us_message','API\PageController@contactUsMessage');
//------------------>Privacy Policy----------------------->
Route::get('get_page/{type}','API\PageController@getPageByType');
//------------------>Advertisment----------------------->
Route::get('get_advertisement','API\PageController@getAdvertisementBanner');
Route::apiResource('address', 'API\AddressController');

Route::get('categories/{type}', 'API\VendorController@getCategories');
/* Ecommerce vendors */
Route::get('ecommerce_vendors', 'API\VendorController@getEcommerceVendors');
Route::get('product_list/{id}', 'API\VendorController@ecommerceVendorProducts');
Route::get('product_details/{id}', 'API\VendorController@getProductDetails');
/* Contractor Vendors */
Route::get('contractors_list', 'API\VendorController@getContractors');
Route::get('contractor_detail/{id}', 'API\VendorController@getContractorDetail');
// Route::get('product_details/{id}', 'API\VendorController@getProductDetails');

Route::group(['prefix' => 'auth'], function(){
    Route::post('login', 'API\AuthController@login');
    Route::post('register', 'API\AuthController@register');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('profile', 'API\UserController@profile');
        Route::post('update_profile', 'API\UserController@updateProfile');
        Route::post('update_password', 'API\AuthController@updatePassword');
        // Route::apiResource('address', 'API\AddressController');
    });
});
