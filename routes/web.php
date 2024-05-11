<?php

use App\Http\Controllers\Auth\DashBoardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\View\Compilers\ComponentTagCompiler;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('index');
});

Auth::routes([
    // 'register'=>false,
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard',[DashBoardController::class,'home'])->name('dashboard');
    Route::get('logout',[DashBoardController::class,'log_out'])->name('logout');

    // category route 
    Route::get('add-category',[CategoryController::class,'index']);
    Route::post('add-category',[CategoryController::class,'add_category']);
    Route::get('view-category',[CategoryController::class,'view_category']);
    Route::get('edit-category/{id}',[CategoryController::class,'edit_category']);
    Route::post('edit-category/{id}',[CategoryController::class,'update_category']);
    Route::get('delete-category/{id}',[CategoryController::class,'category_delete']);


    // tags route 
    Route::get('/add-tag',[TagController::class,'index']);
    Route::post('/add-tag',[TagController::class,'insert_tag']);
    Route::get('/view-tag',[TagController::class,'view_tag']);
    Route::get('/edit-tag/{id}',[TagController::class,'tag_edit']);
    Route::post('/edit-tag/{id}',[TagController::class,'edit_tag']);
    Route::get('/delete-tag/{id}',[TagController::class,'delete_tag']);

    // Post route 
    Route::get('admin/add-post',[PostController::class,'add_post']);
    Route::post('admin/add-post',[PostController::class,'store']);
    Route::get('admin/index',[PostController::class,'index']);
    Route::get('admin/post-edit/{id}',[PostController::class,'editPost']);
    Route::post('admin/post-update/{id}',[PostController::class,'update']);
    Route::get('admin/post-delete/{id}',[PostController::class,'delete']);
});

