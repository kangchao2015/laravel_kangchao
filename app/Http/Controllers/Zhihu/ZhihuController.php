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
    	$users = DB::select('select * from live_info');
    	return view('zhihu/index', $users);
    }
}
