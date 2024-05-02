<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function add_post(){
        $categories=Category::get();
        $tags=Tag::get();

        return view('post.create-post',compact('categories','tags'));

    }
}
