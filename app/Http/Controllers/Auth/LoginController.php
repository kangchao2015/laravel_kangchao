<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function getLogout(){

        Session::forget("uname");
        return redirect('/admin')->withInput( ["msg","退出成功"]);
    }

    public function getLogin(){

//        dd(\Request::url());
//        dd(\Request::method());
    }

    public function postLogin(Request $req){


        Session::put("uname",$req->input("uname"));


        return redirect('/admin');

//        $req->session()->flush();
//        $req->flash();
//        dd(Session::all());

//        $name = $req->input('username', null);
//        $pwd  = $req->input('password', null);


//        $req->session()->put('username', $name);
//        $req->session()->put('password', $pwd);
//
//        $name = Session::get("username");
//
//
//        return view('zhihu.admin',[
//            "name"=>$name
//        ])->with('type',"admin");
//        dd(\Request::input());

    }
}
