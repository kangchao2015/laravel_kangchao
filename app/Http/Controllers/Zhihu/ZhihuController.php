<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ZhihuController extends Controller
{

	public function __construct(){

		//放置中间件
        // DB::setFetchMode(PDO::FETCH_ASSOC);

	}

    public function objectToArray($object) {
        return json_decode(json_encode($object), true);
    }

    public function index(){
    	$data      = [];
    	$data_all  = DB::select('select * from live_info limit 0,2');
        $data_all  = DB::table("live_info")->paginate(15);

        $data = $this->objectToArray($data_all);


    	// $data["user"] = $users;
    	// $data["title"] = "知乎live";
    	// return view('zhihu/child', $data);
    
        // $name = 'helloiu';
        // $data = ['sss'=>'111','zzz'=>'222'];
        // // $students = Student::get();
        // $students = [
        //     'a'=>['created_at'=>'12312312'],
        //     'b'=>['created_at'=>'123'],
        //     'c'=>['created_at'=>'321']
        // ];
        return view('zhihu.index',[
            'data' => $data,
        ])->with('test',"kangchao");
    }
}
