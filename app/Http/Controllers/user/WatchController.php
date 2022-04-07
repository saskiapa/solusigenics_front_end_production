<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\api\WatchedController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    public function index(Request $request, $id)
    {
        WatchedController::store($id, $request->input('source'));
        return view('pages.user.watch');
    }
}
