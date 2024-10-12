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

Route::group(['prefix' => 'v1','namespace'=>'Api'],function(){

  Route::post('register','AuthController@register');
  Route::post('login','AuthController@login');
  Route::post('password','AuthController@password');
  Route::post('reset','AuthController@reset');
  Route::get('governorates','MainController@governorates');
  Route::get('cities','MainController@cities');



  Route::group(['middleware'=>'auth:api'],function(){
      Route::get('profile','AuthController@myProfile');
      Route::get('posts','MainController@posts');
      Route::post('register-token','AuthController@registerToken');
      Route::post('remove-token','AuthController@removeToken');
      Route::post('donation-request/create','MainController@donationRequestCreate');
      Route::post('notifications-settings','MainController@notificationSettings');
      Route::get('notifications','MainController@Notifications');
      Route::get('post','MainController@post');
      Route::get('donation-requests-list','MainController@donationRequests');
      Route::post('contact','Maincontroller@contact');
      Route::post('post-toggle-favourite','MainController@postFavourite');
      Route::get('my-favourites','MainController@Favourites');
      Route::get('settings','MainController@settings');
      Route::get('donation-request','MainController@donationRequest');

  });

});
