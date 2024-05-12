<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;


class BlogController extends Controller
{
    function index(){
        $posts= Post::get();
        return view('index',compact('posts'))->with('category');
    }
    function singleBlog($id){
       $post= post::findOrFail($id);
       $posts= post::get()->take(3);
       $tags= Tag::get();
        return view('singleblog',compact('post','posts','tags'))->with('category','user');
    }
}
