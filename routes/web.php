<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\login;
Route::get('/',[PostController::class,'index'])->name('posts.index');
Route::group(['prefix'=>'posts'],function(){
    Route::get('/',[PostController::class,'index'])->name('posts.index');
    Route::get("/create",[PostController::class,"create"])->name('posts.create');
    Route::post("/",[PostController::class,'store'])->name('posts.store');
    Route::get('/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::get('{post}',[PostController::class,'show'])->name("posts.show");
    Route::put('/{post}',[PostController::class,'update'])->name('posts.update');
    Route::delete('/{post}',[PostController::class,'destroy'])->name('posts.destroy');
});
Route::get('/login',[login::class,'login'])->name('auth.login');
Route::post('/login',[login::class,'doLogin'])->name('auth.post');
// Route::get('/hello',[TestController::class,'FirstAction']);
// Route::get('/about',[TestController::class,'greet']);
