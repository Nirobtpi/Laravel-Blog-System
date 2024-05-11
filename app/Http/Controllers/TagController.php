<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    function tag_edit($id){
        $tag=Tag::findOrFail($id);
        return view('tags.edit-tag',compact('tag'));
    }
    function edit_tag($id,Request $request){

        $request->validate([
            'name'=>['required'],
        ],[
            'tag.required'=>'Tag Name Required',
        ]);

        Tag::findOrFail($id)->update([
            'name'=>$request->name,
         ]);
         return back()->with('success','Tag Updated Successfully');
    }
    function delete_tag($id){
        Tag::findOrFail($id)->delete();
        // $tag=Post::findOrFail($id);
        //  $tag->tags()->detach() ;
         return back()->with('success','Tag Deleted Successfully');
    }
}
