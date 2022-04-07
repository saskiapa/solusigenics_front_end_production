<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function checkLogin(Request $request)
    {
        $userId = User::checkLogin($request->emailorusername, $request->password);
        if ($userId != "NF") {
            session(['id' => $userId]);
        }
        return $userId;
    }
}
