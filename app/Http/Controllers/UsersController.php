<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($idName)
    {
        $rUser = User::where('id_name',$idName)->first();

        return view('users.show',[
            'user' => $rUser,
        ]);
    }
}
