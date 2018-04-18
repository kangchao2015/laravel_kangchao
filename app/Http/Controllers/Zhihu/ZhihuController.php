<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\live_info;
use App\member;


class ZhihuController extends Controller
{

	public function __construct(){

		//放置中间件
        // DB::setFetchMode(PDO::FETCH_ASSOC);
	}

    public function api_get_specific_live($live_id){
        $data = live_info::where("id",$live_id)->first();
        return $data?["data"=>$data,"code"=>200]:["code"=>404];
    }

    public function objectToArray($object) {
        return json_decode(json_encode($object), true);
    }

    public function test($id = null ){



        $res = DB::select("select * from live_info limit 5");
        dd($res);



	    //输出视图
//        return view("welcome");
//        return view("welcome",[
//                'name'=>'kangchao',
//                'age'=>999
//            ]);

//        $data = live_info::where('feedback_score','>', 4.9)->orderBy('id', 'desc')->take(10)->get();
//        $data = live_info::where('feedback_score','>', 4.9)->pluck("uuid","starts_at",'id');
//        $data = live_info::all();
//        $data = $data->reject(function($d){
//            return $d->feedback_score != 5.0;
//        })->map(function($d){
//            return $d->subject;
//        });
//
//        foreach($data as $k=>$v){
//            echo $k."==>".$v;
//            echo "<br>";
//        }
    }

    public function index(){

        $data_all  = DB::table("live_info")->paginate(15);
        $data = $this->objectToArray($data_all);

        return view('zhihu.index',[
            'data' => $data,
        ])->with('test',"kangchao");
    }
}
