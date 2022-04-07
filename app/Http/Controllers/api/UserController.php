<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function isUsernameExist(Request $request)
    {
        return User::where('username', $request->username)->count() > 0 ? 1 : 0;
    }
    
    public function isEmailExist(Request $request)
    {
        return User::where('email', $request->email)->count() > 0;
    }

    public function checkUsernameAndEmailExist(Request $request)
    {
        $data = [
            "isUsernameExist" => User::where('username', $request->username)->count() > 0 ? 1 : 0,
            "isEmailExist" => User::where('email', $request->email)->count() > 0 ? 1 : 0,
        ];
        return $data;
    }

    public function getCurrentUsername()
    {
        $id = session('id');
        return User::where('id', $id)->first()->username;
    }
}
