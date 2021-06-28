<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/details/{id}', [PostController::class, 'show'])->name('details');

Route::get('/form', fn() => view("postForm"))->name('showForm');
Route::post('/createPost', [PostController::class, "create"])->name('createPost');

Route::get('/register', [RegisterController::class, "index"])->name('register');
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/login', [LoginController::class, "index"])->name('login');
Route::post('/login', [LoginController::class, "login"]);

Route::post('/logout', [LogoutController::class, "index"])->name('logout');

Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
