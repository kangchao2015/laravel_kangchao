<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ZhihuController extends Controller
{

	public function __construct(){

		//放置中间件

	}

    public function index(){
    	// $data = [];
    	// $users = DB::select('select * from live_info limit 0,10');

    	// $data["user"] = $users;
    	// $data["title"] = "知乎live";
    	// return view('zhihu/child', $data);
    
        $name = 'helloiu';
        $data = ['sss','zzz'];
        // $students = Student::get();
        $students = [
            'a'=>['created_at'=>'12312312'],
            'b'=>['created_at'=>'123'],
            'c'=>['created_at'=>'321']
        ];
        return view('zhihu.index',[
            'name' => $name,
            'data' => $data,
            'students' => $students,
        ])->with('test',"kangchao");
    }
}
