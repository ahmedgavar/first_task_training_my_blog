<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 1 post controller routes

Route::controller(PostController::class)
    // ->middleware('auth:sanctum')
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
    Route::get('/create/{comment}','create')->name('comments.create');
    Route::post('/','store')->name('comments.store');

    Route::get('/{comment}','show')->name('comments.show');
    Route::get('/{comment}/edit','edit')->name('comments.edit');


    Route::put('/{comment}','update')->name('comments.update');


});



Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});