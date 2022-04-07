<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class SignupController extends Controller
{
    public function index(Request $request)
    {
        $password = Hash::make($request->password);
        
        $user = new User();
        $user->id = User::count() + 1;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $password;
        $user->save();
        return Redirect::to("/login?alert=true&type=success&info=RS");
    }
}
