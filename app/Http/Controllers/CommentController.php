<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    function Add_comment(Request $request , $post_id){
        return $request->all();
    }
}
