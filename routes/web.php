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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/','Zhihu\ZhihuController@index');

// Route::get('users', function () {
// 	echo "adsfasdfasdfda";
// });

// Route::get('zhihu', 'Zhihu\ZhihuController@index');

// Route::get('/zhihu', function () {
//     return view('zhihu.index');
// });


// Route::get('home', function(){
// 	return View::make('users');
// });
// Route::resource('static', 'StaticController');

// Route::get('user/{age}', 'UserController@show');

// Route::get('user/{age}', function ($age) {
// 	echo $age."sdfas";
// });

// Route::resource('photos', 'PhotoController');

// Route::get('blade', function () {
//     return view('layouts/child');
// });


// Route::get('vue', function () {
//     return view('vue_test');
// });