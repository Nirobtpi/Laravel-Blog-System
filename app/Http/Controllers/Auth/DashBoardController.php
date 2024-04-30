<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashBoardController extends Controller
{
    public function home(){
        return view('auth.dashboard');
    }
    function log_out(){
        Auth::logout();
        return view('auth.login');
    }
}
