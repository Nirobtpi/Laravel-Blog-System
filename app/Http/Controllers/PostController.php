<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Post\CreatePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    function add_post(){
        $categories=Category::get();
        $tags=Tag::get();
        

        return view('post.create-post',compact('categories','tags'));

    }

    function store(Request $request){
    //  return  $request->photo;

        $request->validate([
            'title'=>['required','string','max:255'],
            'description'=>['required'],
            'status'=>['required'],
            'category_id'=>['required'],
            'photo'=>['nullable','image','max:5120'],
            'tags'=>['required','array'],
            'tags.*'=>['required','string'],
        ],[
            'title.required'=>"Title Is Required",
            'description.required'=>"Description Is Required",
            'status.required'=>"Publish Is Required",
            'category_id.required'=>"Category Is Required",
            'tags.required'=>"Tags Is Required",
        ]);
         

      try{
        DB::beginTransaction();
            $photo = null;

            if($request->hasFile('photo')){
                $directory = public_path('upload/image');
                File::ensureDirectoryExists($directory);

                $filename = $request->file('photo')->hashName();
                $request->file('photo')->move($directory, $filename);
                $photo = 'upload/image/' . $filename;
            }
            $post=  Post::create([
                'user_id'=> auth()->id(),
                'category_id'=>$request->category_id,
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status,
                'photo'=>$photo,
            ]);

                foreach($request->tags as $tag){
                    $post->tags()->attach($tag);
                };
        DB::commit();

        $request->session()->flash('success_alert','Post Created Successfully');
        return redirect('admin/index');
       

      }catch(\Exception $e){
        DB::rollBack();
        return back()->withErrors($e->getMessage());
      };


    }
    function index(){
        $posts=Post::where('user_id', '=', Auth::user()->id)->with('category','user')->paginate(10);
        return view('post.index',compact('posts'));
    }

    function editPost($id){
         $categories=Category::get();
        $tags=Tag::get();
        $post=Post::findOrFail($id);
        return view('post.edit',compact('categories','tags','post'));
    }

    function update(Request $request, $id){
        $request->validate([
                    'title'=>['required','string','max:255'],
                    'description'=>['required'],
                    'status'=>['required'],
                    'category_id'=>['required'],
                    'photo'=>['nullable','image','max:5120'],
                    'tags'=>['required','array'],
                    'tags.*'=>['required','string'],
            ],[
                    'title.required'=>"Title Is Required",
                    'description.required'=>"Description Is Required",
                    'status.required'=>"Publish Is Required",
                    'category_id.required'=>"Category Is Required",
                    'tags.required'=>"Tags Is Required",
            ]);
            $post=Post::findOrFail($id);
           

        if($request->hasFile('photo')){
            if($post->photo){
                File::delete(public_path($post->photo));
                Storage::disk('public')->delete($post->photo);
            }

            $directory = public_path('upload/image');
            File::ensureDirectoryExists($directory);

            $filename = $request->file('photo')->hashName();
            $request->file('photo')->move($directory, $filename);
            $photo = 'upload/image/' . $filename;
        }else{
            $photo=$post->photo;
        }


        $post->update([
            'category_id'=>$request->category_id,
            'title'=>$request->title,
            'description'=>$request->description,
            'status'=>$request->status,
            'photo'=>$photo,
        ]);
        $post->tags()->sync($request->tags);
        $post->tags()->detach($request->tags);

        foreach($request->tags as $tag){
            $post->tags()->attach($tag);
        };


        $request->session()->flash('success_alert','Post Updated Successfully');
        return redirect('admin/index');

    }

    function delete($id){
        $post=Post::findOrFail($id);
        // $post->tags()->detach() force delete korar jorno;
        // $post->forceDelete();
        $post->delete();
        return back()->with('error','Post delete successfully');
    }
      
}
