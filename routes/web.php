<?php

use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('post/user/{user}', [PostController::class,'getPostsBy'])->name('post.user');
Route::group(['middleware'=>'auth'],function (){
    Route::resource('/post', PostController::class);
    Route::get('/dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');
});

require __DIR__.'/auth.php';
