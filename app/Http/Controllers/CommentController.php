<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    function Add_comment(Request $request , $post_id){
        $request->validate([
            'comment'=>['required','string']
        ]);

        if(auth()->check()){

            if(! Post::find($post_id)){
                abort(404);
            }
           Comment::create([
                'post_id'=>$post_id,
                'user_id'=>auth()->id(),
                'comment'=>$request->comment,
            ]);

            $request->session()->flash('alert_success','Your comment added successfully');
        }

        return back();

    }
     function commentDelete($id){
        Comment::findOrFail($id)->delete();

        return back()->with('alert_success','Commnet Delete Successfully');
    }
}
