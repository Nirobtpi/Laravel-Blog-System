<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashBoardController extends Controller
{
    public function home(){
        $count=Post::count();
        $categoryCount=Category::count();
        $tagsCount=Tag::count();
        $usersCount=User::count();
        return view('auth.dashboard',compact('count','categoryCount','tagsCount','usersCount'));
    }
    function log_out(){
        Auth::logout();
        return view('auth.login');
    }
}
