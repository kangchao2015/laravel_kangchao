<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\live_infos;
use App\member;
use Illuminate\Support\Facades\Session;
use App\keywords;


class ZhihuController extends Controller
{

	public function __construct(){

		//放置中间件
        // DB::setFetchMode(PDO::FETCH_ASSOC);
	}

    public function api_get_specific_live($live_id){
        $data = live_infos::where("id",$live_id)->first();
        return $data?["data"=>$data,"code"=>200]:["code"=>404];
    }

    public function objectToArray($object) {
        return json_decode(json_encode($object), true);
    }

    public function test($id = null ){



        $res = DB::select("select * from live_infos limit 5");
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

    public function index(request $req){


        if ($req->isMethod('post')) {
            $name = $req->input('name', null);
            $author = $req->input('author', null);
            $cat = $req->input('cat', null);

            if($name != Session::get("name") || $author != Session::get("author") || $cat !=  Session::get("cat")){
                DB::table('keywords')->insert(
                    [
                        'subject' => "$name",
                        'author' => "$author",
                        "category" => "$cat",
                        "created_at" => time(),
                        "remote_ip" =>$_SERVER['REMOTE_ADDR'],
                        "type" => 1
                    ]
                );
            }

            $req->session()->put('name', $name);
            $req->session()->put('author', $author);
            $req->session()->put('cat', $cat);



        }

        $name =  Session::get("name");
        $cat =  Session::get("cat");
        $author =  Session::get("author");


        $data_all = DB::table('live_infos')
            ->where('subject', 'like', "%$name%")
            ->where('tags_0_name', 'like', "%$cat%")
            ->where('speaker_member_name', 'like', "%$author%")
            ->orderBy('accessable', 'desc')
            ->paginate(15);

        $keywords_data = DB::table("keywords")
            ->where("subject","<>", "")
            ->whereIn ("type",[0,1])
            ->offset(0)
            ->limit(10)
            ->orderby("created_at", "desc")
            ->get();

        $time = $keywords_data->first()->created_at;
        $time = date("Y-m-d H:i:s", $time);
//        $data_all  = DB::table("live_info")->paginate(15);
        $data = $this->objectToArray($data_all);

        return view('zhihu.index',[
            'data' => $data,
            "keywords" => $keywords_data,
            "time" =>$time,
            'uname' => Session::get("uname"),
            'search' => [
                'name' => $name,
                'cat'   =>$cat,
                'author' =>$author
            ]
        ])->with('type',"live");
    }
}
