<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\live_info;
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


    public function index(request $req){


        if ($req->isMethod('post')) {
            $name = $req->input('name', null);
            $author = $req->input('author', null);
            $cat = $req->input('cat', null);

            $req->session()->put('name', $name);
            $req->session()->put('author', $author);
            $req->session()->put('cat', $cat);

        }

        $name =  Session::get("name");
        $cat =  Session::get("cat");
        $author =  Session::get("author");


        $data_all = DB::table('live_info')
            ->where('subject', 'like', "%$name%")
            ->where('tags_0_name', 'like', "%$cat%")
            ->where('speaker_member_name', 'like', "%$author%")
            ->orderBy('fee_original_price', 'desc')
            ->paginate(15);


//        $data_all  = DB::table("live_info")->paginate(15);
        $data = $this->objectToArray($data_all);

        return view('zhihu.sijiake',[
            'data' => $data,
            'search' => [
                'name' => $name,
                'cat'   =>$cat,
                'author' =>$author
            ]
        ])->with('type',"sijiake");
    }
}
