<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Comment;


class BlogController extends Controller
{
    function index(){
        $posts= Post::simplePaginate(3);
        
        return view('index',compact('posts'))->with('category');
    }
    function singleBlog($id){
       $post= post::with('tags')->findOrFail($id);
       $posts= Post::get()->take(3);
       $tags= Tag::get();
       $comments=Comment::where('post_id','=', $id)->get();
       $count=Comment::where('post_id','=', $id)->count();
        return view('singleblog',compact('post','posts','tags','comments','count'))->with('category','user');
    }

    function tagLink($id){
        $mytag=Tag::findOrFail($id);
        $postsWithTag = Post::whereHas('tags', function ($query) use ($id) 
        {$query->where('id', $id);}
        )->get();

        return view('tag', compact('postsWithTag','mytag'));
    }
}
