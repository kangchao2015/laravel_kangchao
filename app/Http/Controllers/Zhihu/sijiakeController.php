<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\sijiake_infos;
use App\member;
use Illuminate\Support\Facades\Session;


class sijiakeController extends Controller
{

	public function __construct(){

		//放置中间件
        // DB::setFetchMode(PDO::FETCH_ASSOC);
	}


    public function objectToArray($object) {
        return json_decode(json_encode($object), true);
    }

    public function api_get_specific_sijiake($live_id){
        $data = sijiake_infos::where("id",$live_id)->first();
        return $data?["data"=>$data,"code"=>200]:["code"=>404];
    }


    public function index(request $req){

        if ($req->isMethod('post')) {
            $name = $req->input('title', null);
            $author = $req->input('author', null);


            if($name != Session::get("sname") || $author != Session::get("sauthor") ){
                DB::table('keywords')->insert(
                    [
                        'subject' => "$name",
                        'author' => "$author",
                        "created_at" => time(),
                        "remote_ip" =>$_SERVER['REMOTE_ADDR'],
                        "type" => 2
                    ]
                );
            }

            $req->session()->put('sname', $name);
            $req->session()->put('sauthor', $author);



        }

        $name =  Session::get("sname");
        $author =  Session::get("sauthor");

        $keywords_data = DB::table("keywords")
            ->where("subject","<>", "")
            ->where ("type","=", 2)
            ->offset(0)
            ->limit(10)
            ->orderby("created_at", "desc")
            ->get();


        $data_all = DB::table('sijiake_infos')
            ->where('title', 'like', "%$name%")
            ->where('author', 'like', "%$author%")
            ->orderby("accessable", "desc")
            ->paginate(15);

        $time = $keywords_data->first()->created_at;
        $time = date("Y-m-d H:i:s", $time);

        $data = $this->objectToArray($data_all);
        return view('zhihu.sijiake',[
            'data' => $data,
            'uname' => Session::get("uname"),
            "time" => $time,
            "keywords" =>$keywords_data,
            'search' => [
                'name' => $name,
                'author' =>$author
            ]
        ])->with('type',"sijiake");
    }
}
