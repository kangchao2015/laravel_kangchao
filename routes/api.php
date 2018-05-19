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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/live/{id?}','Zhihu\ZhihuController@api_get_specific_live')->name("showdetail_live");
Route::get('/sijiake/{id?}','Zhihu\sijiakeController@api_get_specific_sijiake')->name("showdetail_sijiake");
