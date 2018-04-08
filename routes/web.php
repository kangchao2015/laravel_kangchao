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
Route::get('/t','Zhihu\ZhihuController@test');
Route::get('/test1','test\testController@test1');
Route::get('/test2','test\testController@test2');
Route::get('/test3','test\testController@test3');
Route::get('/test4','test\testController@test4');
Route::get('/test5','test\testController@test5');
Route::get('/test6','test\testController@test6');


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