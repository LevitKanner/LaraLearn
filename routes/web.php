<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index'])->name('posts');
Route::get('/details/{id}', [PostController::class, 'show'])->name('details');

Route::get('/createPost', [PostController::class, "create"])->name('createPost');
Route::post('/createPost', [PostController::class, "store"]);
Route::delete('/posts/{post}/delete', [PostController::class, "destroy"])->name('posts.delete');
Route::get('/posts/{user:name}/posts', [PostController::class, "list"])->name('user.posts');

Route::get('/register', [RegisterController::class, "index"])->name('register');
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/login', [LoginController::class, "index"])->name('login');
Route::post('/login', [LoginController::class, "login"]);

Route::post('/logout', [LogoutController::class, "index"])->name('logout');

Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');

Route::post('/post/{post}/likes', [LikeController::class, "index"])->name('post.like');
Route::delete('/post/{post}/unlike', [LikeController::class, "destroy"])->name('post.unlike');
