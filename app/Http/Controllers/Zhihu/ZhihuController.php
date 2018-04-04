<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\live_info;


class ZhihuController extends Controller
{

	public function __construct(){

		//放置中间件
        // DB::setFetchMode(PDO::FETCH_ASSOC);

	}

    public function objectToArray($object) {
        return json_decode(json_encode($object), true);
    }

    public function test(){

        $data = live_info::where('feedback_score','>', 4.9)->orderBy('id', 'desc')->take(10)->get();
        $data = live_info::where('feedback_score','>', 4.9)->pluck("uuid","starts_at",'id');

        foreach($data as $k=>$v){
            echo $k."==>".$v;
            echo "<br>";
        }
    }

    public function index(){

        $data_all  = DB::table("live_info")->paginate(15);
        $data = $this->objectToArray($data_all);

        return view('zhihu.index',[
            'data' => $data,
        ])->with('test',"kangchao");
    }
}
