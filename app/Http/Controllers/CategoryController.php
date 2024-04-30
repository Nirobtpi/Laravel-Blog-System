<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
}
