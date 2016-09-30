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
//Route::get('home', 'HomeController@home');
Route::post('search/business', 'HomeController@searchResult');

Route::get('profile/{username}/{id}', 'UsersController@profile')->name('profile');
Route::post('profile/edit/{id}','UsersController@edit');
Route::post('profile/{id}/upload','UsersController@userphotos');
Route::post('profile/{id}/photo', 'UsersController@userprofilephoto');
Route::get('profile/photo', 'UsersController@userphoto');
Route::get('claimbiz', 'UsersController@claim');
Route::get('report', 'UsersController@report');
Route::post('claimbiz/{id}', 'UsersController@claimbiz');
Route::post('deleteFav', 'UsersController@deletefav');
Route::post('deleteClaimed', 'UsersController@deleteclaim');

Route::get('categories', 'HomeController@categories');
Route::get('businesses', 'HomeController@businesses');
Route::get('businesses2', 'HomeController@businesses2');
Route::get('map', 'HomeController@map');
Route::get('locations', 'HomeController@locations');
Route::get('contact', 'HomeController@contact');
Route::get('aboutus', 'HomeController@aboutus');
Route::get('tos', 'HomeController@tos');
Route::get('faqs', 'HomeController@faqs');
Route::get('privacy', 'HomeController@privacy');
//Route::get('search-results', 'HomeController@searchResults');

Route::post('favourites', 'HomeController@favoured');
Route::get('favourites', 'HomeController@favours');
Route::delete('favourites/{biz_id}', 'HomeController@unfavoured');
Route::get('users/{userId}/favourites', 'HomeController@favourites');

Route::resource('biz', 'BizController');

//Route::get('bizreg', 'HomeController@regbiz');
Route::get('biz/profile/{slug}/{id}', 'HomeController@getBizreview')->name('bizprofile');
Route::post('bizprofile/{id}/photo', 'HomeController@bizprofilephoto');

Route::get('bizprofile/{id}/edit', 'HomeController@bizedit');
Route::post('bizprofile/{id}/edit', 'HomeController@postbizedit');

Route::post('biz/{id}/upload','HomeController@bizphotos');
Route::post('review/biz/{id}', 'HomeController@postReview');
Route::get('biz/subcat/{slug}', 'HomeController@bizSub');
Route::get('biz/cat/{slug}', 'HomeController@bizCat');

Route::post('reportBiz','BizController@reportBiz');

Route::get('/error',function(){
   abort(404);
});

//Route::get('search', 'HomeController@search');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('activating/profile/{code}', 'UsersController@activate');
Route::get('confirm','HomeController@confirm');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('testing/email/view','EmailController@checkView');
Route::get('testing/email','EmailController@sendTest');
Route::get('confirmation/resend','EmailController@resendConfirmation');

Route::get('api/location', 'ApiController@location');
Route::get('api/ajax/location', 'ApiController@ajxlocation');
Route::get('api/category', 'ApiController@category');
Route::get('api/ajax/category', 'ApiController@ajxcategory');
Route::get('api/ajax/subcategory', 'ApiController@ajxsubcategory');
Route::get('api/company', 'ApiController@company');
Route::get('api/lga', 'ApiController@lga');
Route::get('api/subcat', 'ApiController@subcat');
Route::get('api/subcat2', 'ApiController@subcat2');
Route::get('api/featured', 'ApiController@featured');
Route::get('api/admin', 'ApiController@admin');
Route::post('api/subscribe', 'ApiController@subscribe');
Route::resource('task/api', 'ApiiController');
Route::get('task/api/delete/{id}', 'ApiiController@del');

Route::get('login/facebook', 'Auth\AuthController@facebook');

// Admin area
//get('admin', function () {
//  return redirect('/admin/');
//});

$router->group([
  'namespace' => 'Admin',
  'middleware' => 'admin',
], function ($router) {
  $router->get('admin', 'AdminController@index');
//  TODO -> testing - rem to delete
   $router->get('admin2', 'AdminController@index2');
  $router->post('admin/settings','AdminController@settings');
  $router->resource('admin/biz', 'BizController');
  $router->resource('admin/cat', 'CatController');
  $router->resource('admin/user','UsersController');
  $router->resource('admin/report','ReportController');
  $router->resource('admin/location', 'LocationController');
  $router->delete('admin/location/delete','LocationController@delSelected');
  $router->get('admin/upload', 'UploadController@index');
  $router->post('admin/sub', 'SubCatController@deleteSub');
  $router->post('admin/upload/file', 'UploadController@uploadFile');
  $router->delete('admin/upload/file', 'UploadController@deleteFile');
  $router->post('admin/upload/folder', 'UploadController@createFolder');
  $router-> delete('admin/upload/folder', 'UploadController@deleteFolder');

  Route::post('admin/biz/delete','BizController@deleteBiz');
  Route::post('admin/cat/delete','CatController@deleteCat');
  Route::post('admin/sub/delete','CatController@deleteSub');
  Route::post('admin/report/delete','ReportController@deleteReport');
});


Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
