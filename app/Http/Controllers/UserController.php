<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use App\live_info;

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
        $flights = live_info::all();

        foreach ($flights as $flight) {
            echo $flight->name;
        }
    }



    private function dealstr($ori){

        return str_replace('\"','"',$ori);

    }
}