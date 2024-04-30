<?php

use App\Http\Controllers\Auth\DashBoardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/auth', function () {
    return view('auth.dashboard');
});

Auth::routes([
    'register'=>false,
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[DashBoardController::class,'home'])->name('dashboard');
Route::get('logout',[DashBoardController::class,'log_out'])->name('logout');

// category route 
Route::get('add-category',[CategoryController::class,'index']);
Route::post('add-category',[CategoryController::class,'add_category']);
