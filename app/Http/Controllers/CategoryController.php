<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function index(){
        return view('category.add-category');
    }

    function add_category(Request $request){
       
       $request->validate([
        'category'=>['required','unique:categories,name,']
       ],[
        'category.required'=>'Category Name Is Required',
        'category.unique'=>'Category Name Already Used',
       ]);
       Category::create([
            'name'=>$request->category,
       ]);

       return back()->with('success','Category Add Successfully');
    }
    function view_category(){
        $userid=Auth::user()->id;
        $categories=Category::get();
        return view('category.view-category',compact('categories'));
    }
    function edit_Category($id){
        $getCategory=Category::findOrFail($id);

        return view('category.edit-category', compact('getCategory'));
    }

    function update_category($id, Request $request){
       $request->validate([
        'category'=>['required','unique:categories,name,'.$id]
       ],[
        'category.required'=>'Category Name Is Required',
        'category.unique'=>'Category Name Already Used',
       ]);
       Category::findOrFail($id)->update([
            'name'=>$request->category,
       ]);
       return back()->with('success','Category Updated Successfully');
    }
    function category_delete($id){
        Category::findOrFail($id)->delete();

        return back()->with('success','Category Deleted Successfully');
    }

}
