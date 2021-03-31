<?php

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->name(('dashboard'));

Route::get('/axios', [PostController::class, 'axios']);

Route::get('/posts', [PostController::class, 'index'])->name(('posts'));
Route::get('/posts/{item:id}', [PostController::class, 'show'])->name(('posts.show'));
Route::post('/posts', [PostController::class, 'store']);

Route::get('/users/{user:name}/posts', [UserPostController::class, 'index'])->name(('users.posts'));

Route::get('/login', [LoginController::class, 'index'])->name(('login'));
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class,'store'])->name('logout');

Route::get('/register', [Register::class, 'index'])->name(('register'));
Route::post('/register', [Register::class, 'store']);


Route::post('/posts/{item}/likes', [PostLikeController::class, 'store'])->name(('likes'));
Route::delete('/posts/{item}/unlike', [PostLikeController::class, 'destroy'])->name(('unlike'));
Route::delete('/posts/{item}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/', function () {
    return view('home');
})->name(('home'));
