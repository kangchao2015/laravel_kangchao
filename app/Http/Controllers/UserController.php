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
        echo route("ss1ss");
        // return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}