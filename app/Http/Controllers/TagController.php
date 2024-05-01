<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    function index(){
        return view('tags.add-tag');
    }
    function insert_tag(Request $request){
        $request->validate([
            'tag'=>['required'],
        ],[
            'tag.required'=>'Tag Name Required',
        ]);
        Tag::create([
            'name'=>$request->tag,
        ]);
        return back()->with('success','Tag Created Successfully');
    }
    function view_tag(){
       $tags=Tag::all();
        return view('tags.view-tag',compact('tags'));
    }
}
