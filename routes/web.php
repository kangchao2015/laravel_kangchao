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

 Route::get('/', function () {
     return view('welcome');
 });


//路由关联控制器的两种方法
//Route::get('/','Zhihu\ZhihuController@index');
//Route::get('/',['uses'=>'Zhihu\ZhihuController@index']);
//Route::any('/',['uses'=>'Zhihu\ZhihuController@index']);
Route::match(['get', 'post'],'/live',[
    'uses'=>'Zhihu\ZhihuController@index',
    'as'=> 'indexalias'
]);

Route::match(['get', 'post'],'/sijiake',[
    'uses'=>'Zhihu\sijiakeController@index',
    'as'=> 'indexalias'
]);

Route::get("/admin","Zhihu\adminController@index");


//通过路由给控制器传递参数
Route::get('/t/{id?}','Zhihu\ZhihuController@test')->where('id','[0-9]+');



Route::get('/test1','test\testController@test1');
Route::get('/test2','test\testController@test2');
Route::get('/test3','test\testController@test3');
Route::get('/test4','test\testController@test4');
Route::get('/test5','test\testController@test5');
Route::get('/test6','test\testController@test6');
Route::get('/test7','test\testController@test7');
Route::get('/test8','test\testController@test8');
Route::get('/test8','test\testController@test8');
Route::get('/test9','test\testController@test9');
Route::get('/test10','test\testController@test10');
Route::get('/test11','test\testController@test11');
Route::get('/test12','test\testController@test12');
Route::get('/test13','test\testController@test13');
Route::get('/test14','test\testController@test14');

Route::group(["middleware"=>["web"]],function(){
    Route::get('/test15',[
        'as'    =>  'test155',
        'uses'  =>  'test\testController@test15'
    ]);
    Route::get('/test16','test\testController@test16');
});



Route::get('/test17','test\testController@test17');
Route::get('/test18','test\testController@test18');

//多请求路由 响应指定类型的路由
Route::match(['get','post'], 'multy', function(){
    return 123;
});

//响应所有的请求
Route::any('multy2', function(){
    return 456;
});

//参数路由
Route::get('user/{id}', function($id){
    return "user". $id;
});

//可选参数路由  添加默认值
Route::get('user2/{id?}', function($id = 'david'){
    return "user2--". $id;
});

//可选参数路由  添加默认值  正则表达式验证  限制参数类型
//多参数验证的时候只需要将验证规则放到一个数组当中就可以
Route::get('user3/{name}/{id}', function($name ,$id ){
    return "user2--". $id . "-+$name";
})->where(['name'=> '[A-Za-z]+','id'=>'[0-9]+']);

//路由别名
Route::get('member/1center',['as'=>'alias',function(){
    return route('indexalias');
}]);

//路由群组
//添加一个路由前缀  给指定的一组路由指定的属性配置
Route::group(['prefix'=>'mmeber'], function(){

    Route::get('member/1center',['as'=>'alias',function(){
        return "ggggggggggggg".route('alias');
    }]);

    Route::get('user2/{id?}', function($id = 'david'){
        return "gggggggggg-user2--". $id;
    });

});

//路由中输出视图
Route::get("/aaa",function(){
    return View::make('welcome');
});













