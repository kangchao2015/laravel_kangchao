<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\sijiakeinfos;
use App\member;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;


class adminController extends Controller
{

	public function __construct(){

		//放置中间件
        // DB::setFetchMode(PDO::FETCH_ASSOC);
	}


    public function objectToArray($object) {
        return json_decode(json_encode($object), true);
    }


    public function index(request $req){


        return view('zhihu.admin',[
            "uname"=>Session::get("uname")
        ])->with('type',"admin");
    }
}
