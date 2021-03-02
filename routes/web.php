<?php

use Illuminate\Support\Facades\Route;

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
Route::get('colors', 'TestController@getColors');

Route::get('lang/{locale}', 'LocalizationController@lang');
Route::post('/image_upload', 'ImageController@imageUplaod');

Route::get('change_password','Auth\ChangePasswordController@ShowChangePasswordForm')->name('change_password');
Route::post('change_password','Auth\ChangePasswordController@changePassword')->name('change_password');

Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'],function(){
	Route::get('/home', 'VendorController@dashboard')->name('home');
	Route::get('dashboard', 'VendorController@dashboard')->name('dashboard');
	Route::get('store','VendorController@index')->name('store');
	Route::get('edit_store','VendorController@edit_store')->name('edit_store');
	Route::post('edit_store','VendorController@update_store')->name('edit_store');
	Route::get('social_links', 'VendorController@getSocial')->name('social_links');
	Route::post('social_links', 'VendorController@saveSocial')->name('social_links');
	Route::resource('products','Products\ProductController')->name('*','products');
	Route::get('contractor_working_hours','WorkingHourController@index')->name('contractor_working_hours');
	Route::post('update_contractor_working_hours','WorkingHourController@update')->name('update_contractor_working_hours');

	Route::get('promote', 'VendorController@promote_me_show')->name('promote');
	Route::post('prommote_me','VendorController@prommote_me')->name('prommote_me');
	Route::post('check','VendorController@Check');

});

/*Route::group(['middleware' => ['auth','admin']], function(){
	Route::resource('products','Products\ProductController')->name('*','products');
});*/

Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
	Route::namespace('Auth')->group(function(){

	    //Login Routes
	    Route::get('/login','LoginController@showLoginForm')->name('login');
	    Route::post('/login','LoginController@login');
	    Route::post('/logout','LoginController@logout')->name('logout');

	    //Forgot Password Routes
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');


	    //Reset Password Routes
	    /*Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
	    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');*/
	});

	Route::middleware('admin')->group( function(){
		Route::get('/', 'DashboardController@index');
		Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
		Route::get('edit_page/{type}', 'PagesController@getPage')->name('edit_page');
		Route::post('save_page', 'PagesController@savePage')->name('save_page');



		Route::resource('categories', 'CategoriesController')->name('*', 'categories');
		Route::get('contact_us_messages', 'ContactUsController@index')->name('contact_us_messages');
		Route::get('contact_us_messages/{id}', 'ContactUsController@get')->name('contact_us_messages.show');
		Route::get('viewed_contact_message/{id}', 'ContactUsController@viwedMessage')->name('viewed_contact_message');
		Route::get('/replyform/{id}',       'ContactUsController@replyform')->name('replyform_contact_us_messages');
        Route::POST('reply',                 'ContactUsController@reply')->name('reply_contact_us_messages');
		Route::resource('heavy_trucks', 'TrucksController')->name('*', 'heavy_trucks');
		Route::get('vendor_requests', 'VendorRequestsController@index')->name('vendor_requests');
		Route::get('vendor_requests/{id}', 'VendorRequestsController@get')->name('vendor_requests.id');
		Route::get('approve_vendor/{id}', 'VendorRequestsController@approveVendorForm')->name('approve_vendor');
		Route::post('approved_vendor_request', 'VendorRequestsController@approvedVendorRequest')->name('approved_vendor_request');
		Route::get('declined_vendor_request/{id}', 'VendorRequestsController@declinedVendorRequest')->name('declined_vendor_request');
		Route::resource('vendors', 'VendorsController')->name('*', 'vendors');
		Route::resource('users', 'UsersController')->name('*', 'users');
		Route::post('reset_password', 'UsersController@resetPassword')->name('reset_password');//Reset password of any user
		Route::get('change_password', 'Auth\ChangePasswordController@ShowChangePasswordForm')->name('change_password');//Change password of any user
		Route::post('change_password', 'Auth\ChangePasswordController@changePassword')->name('change_password');//Change password of any user
		Route::resource('products','Products\ProductController')->name('*','products');
		Route::resource('advertisements','Advertisements\AdvertisementController')->name('*','advertisements');

		Route::get('PromoteVendorAdmin','VendorRequestsController@PromoteVendor')->name('PromoteVendorAdmin');
		Route::resource('promo_code','Promo_Code\PromoCodeController')->name('*','promo_code');
		Route::resource('notification','Notifications\NotificationController')->name('*','notification');

//---------------------------->Baitna Contact Us Details Routee------------------->
        // Route::resource('ContactUsDetails','ContactUsDetails\ContactUsDetailsController')->name('*','ContactUsDetails');
		Route::get('ContactUsDetails','ContactUsDetails\ContactUsDetailsController@index')->name('ContactUsDetails');
		Route::get('ContactUsDetails_edit/{id}','ContactUsDetails\ContactUsDetailsController@edit')->name('ContactUsDetails_edit');
		Route::PUT('ContactUsDetails_update/{id}','ContactUsDetails\ContactUsDetailsController@update')->name('ContactUsDetails_update');


	});
});
