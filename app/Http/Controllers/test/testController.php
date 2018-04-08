<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\live_info;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
class testController extends Controller
{

	//默认情况下，Eloquent 查询的结果返回的内容都是 Collection 实例。
    public function test1(){
        $data = live_info::all();
        $data = $data->reject(function($d){
            return $d->feedback_score != 5.0;
        })->map(function($d){
            return $d->subject;
        });

        // var_dump($data);
        foreach($data as $k=>$v){
            echo $k."==>".$v;
            echo "<br>";
        }
    }

    ///下面的代码在 Collection 类中添加一个 toUpper 方法：
    public function test2(){
		// $collection = collect([1, 2, 3]);
		Collection::macro('toUpper', function () {
	   		return $this->map(function ($value) {
		        return Str::upper($value);
		    });
		});

		$collection = collect(['first', 'second']);

		$upper = $collection->toUpper();

		foreach($upper as $k=>$v){
			echo $k."=>".$v;
			echo "<br>";
		}
    }

    //Collection 类允许你链式调用其方法，以达到在底层数组上优雅地执行 map 和 reject 操作
    public function test3(){
		$collection = collect(['taylor', 'abigail', null])->map(function ($name) {
		    return strtoupper($name);
		})
		->reject(function ($name) {
		    return empty($name);
		});
		foreach($collection as $k=>$v){
			echo $k."=>".$v;
			echo "<br>";
		}
    }

    public function test4(){
		$data = live_info::all();
		live_info::chunk(200, function($d){
			foreach ($d as $key => $value) {
				# code...
				echo $key."-->".$value;
				echo "<br>";
			}
		});

    }

    public function test5(){

    }

    public function test6(){

    }

    public function test7(){

    }

    public function test8(){

    }



}
