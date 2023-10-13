<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Blog\BlogReplyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Users\ActivityController;
use App\Http\Controllers\Users\UserController;
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


// GET REQUESTS
Route::get('/', function () {
    return view('welcome');
    
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [LoginController::class, 'index'])->name('login');
//blogs

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

Route::get('/new-blog', function(){
    return view('blogs.newblog');
})->name('new-blog');

Route::get('/view-blog/{blog_id}',[BlogController::class,'view_blog'])->name('view-blog');


// POST REQUESTS

Route::post('/register', [RegisterController::class, 'new']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::post('/blogs', [BlogController::class, 'create']);
Route::post('/like-activity', [ActivityController::class, 'newActivity'])->name('like-activity');
Route::post('/dislike-activity', [ActivityController::class, 'newActivity'])->name('dislike-activity');

Route::post('/reply', [BlogReplyController::class, 'addReply'])->name('addReply');
