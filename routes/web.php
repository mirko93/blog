<?php

use App\Http\Controllers\AuthorsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostsController;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// posts
Route::get('/posts/create', [PostsController::class, 'create']);
Route::post('/posts', [PostsController::class, 'store']);
Route::get('/posts/{post}', [PostsController::class, 'show']);
Route::delete('/posts/{post}', [PostsController::class, 'destroy']);

// comments
Route::post('/posts/{post}/comments', [PostCommentsController::class, 'store'])->name('posts.comments.store');
Route::delete('/comments/{comment}', [PostCommentsController::class, 'destroy']);

Route::get('/author/{user}', [AuthorsController::class, 'index'])->name('author.show');

