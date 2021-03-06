<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@home');
Route::get('profile/{id}', 'HomeController@profile');
Route::post('search/business', 'HomeController@searchResult');


Route::get('testing1', function () {
return response()->json(['name' => 'Sanjib', 'location' => 'Pluto']);
});
Route::resource('people', 'PeopleController');
Route::bind('people', function ($id){
return App\User::where('id', $id)->first();
});


Route::post('profile/{id}/upload','HomeController@userphotos');
Route::post('biz/{id}/upload','HomeController@bizphotos');
Route::post('bizprofile/{id}/photo', 'HomeController@bizprofilephoto');
Route::post('claimbiz/{id}', 'HomeController@claimbiz');

Route::post('profile/{id}/photo', 'HomeController@userprofilephoto');

Route::get('categories', 'HomeController@categories');
Route::get('businesses', 'HomeController@businesses');
Route::get('map', 'HomeController@map');
Route::get('locations', 'HomeController@locations');
Route::get('search-results', 'HomeController@searchResults');

Route::post('favourites', 'HomeController@favoured');
Route::delete('favourites/{biz_id}', 'HomeController@unfavoured');
Route::get('users/{userId}/favourites', 'HomeController@favourites');

//Route::get('bizreg', 'HomeController@regbiz');
Route::get('review/biz/{id}', 'HomeController@getBizreview');
Route::post('review/biz/{id}', 'HomeController@postReview');
Route::get('biz/subcat/{id}', 'HomeController@bizSub');
Route::get('biz/cat/{id}', 'HomeController@bizCat');
Route::resource('biz', 'BizController');
//Route::get('search', 'HomeController@search');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('activate/{confirmation_code}', 'Auth\AuthController@activateAccount');
Route::get('confirm','HomeController@confirm');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('api/location', 'ApiController@location');
Route::get('api/category', 'ApiController@category');
Route::get('api/company', 'ApiController@company');
Route::get('api/lga', 'ApiController@lga');
Route::get('api/subcat', 'ApiController@subcat');
Route::get('api/featured', 'ApiController@featured');
Route::get('api/admin', 'ApiController@admin');

// Admin area
//get('admin', function () {
//  return redirect('/admin/');
//});

$router->group([
  'namespace' => 'Admin',
  'middleware' => 'admin',
], function () {
  get('admin', 'AdminController@index');
  resource('admin/biz', 'BizController');
  resource('admin/cat', 'CatController');
  resource('admin/user','UsersController');
  resource('admin/location', 'LocationController');
  get('admin/upload', 'UploadController@index');
  post('admin/sub', 'SubCatController@deleteSub');
  post('admin/upload/file', 'UploadController@uploadFile');
  delete('admin/upload/file', 'UploadController@deleteFile');
  post('admin/upload/folder', 'UploadController@createFolder');
  delete('admin/upload/folder', 'UploadController@deleteFolder');
});

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
