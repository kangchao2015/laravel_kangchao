<?php

namespace App\Http\Controllers\Zhihu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\live_info;
use App\member;
use Illuminate\Support\Facades\Session;


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

        ])->with('type',"admin");
    }
}
