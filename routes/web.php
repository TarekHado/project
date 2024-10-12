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

Route::get('/',function(){
  return view('Admin.Index');
});

Route::get('index','api\MainController@index');

Route::get('home',function(){
  return view('home');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('products','ProductController');
});

Route::resource('governorates','GovernorateController');
Route::resource('cities','CityController');
Route::resource('donation-requests','DonationRequestsController');
Route::resource('contact','contacts');
Route::resource('settings','SettingsController');
Route::resource('clients','ClientsController');
Route::resource('category','CategoryController');
Route::resource('posts','PostsController');
Route::resource('users','UserController');
Route::resource('roles','RoleController');
