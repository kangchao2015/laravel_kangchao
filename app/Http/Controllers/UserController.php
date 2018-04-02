<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id = 0)
    {
        echo $id;

        $arr = [
            'url1' => "https://www.baidu.com",
            'url2' => "11111'、\"、\\22222"
        ];

        var_dump($arr);



        $a = urldecode(urlencode(json_encode($arr)));
        echo $a;
        echo $this->dealstr($a);

        // return view('user.profile', ['user' => User::findOrFail($id)]);
    }



    private function dealstr($ori){

        return str_replace('\"','"',$ori);

    }
}