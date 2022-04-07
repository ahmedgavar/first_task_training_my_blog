<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// 1 post controller routes

Route::controller(PostController::class)
    ->middleware('auth')
    ->prefix('posts')
    ->group(function() {
    Route::get('/','index')->name('posts.index');
    Route::get('/create','create')->name('posts.create');
    Route::post('/','store')->name('posts.store');

    Route::get('/{post}','show')->name('posts.show');
    Route::get('/{post}/edit','edit')->name('posts.edit');


    Route::put('/{post}',[PostController::class,'update'])->name('posts.update');


});


// 2 comment controller routes

Route::controller(CommentController::class)
    ->middleware('auth')
    ->prefix('comments')
    ->group(function() {
    Route::get('/','index')->name('comments.index');
    Route::get('/create','create')->name('comments.create');
    Route::post('/','store')->name('comments.store');

    Route::get('/{comment}','show')->name('comments.show');
    Route::get('/{comment}/edit','edit')->name('comments.edit');


    Route::put('/{comment}','update')->name('comments.update');


});
