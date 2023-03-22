<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('user.login');
});

Route::prefix('admin')->name('admin.')->group(function(){
    
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::post('check',[AdminController::class,'check'])->name('check');
        Route::view('login','admin.login')->name('login');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::get('/home',[AdminController::class,'index'])->name('home');

        Route::resource('product',ProductController::class);
        Route::get('img/{id}/{filpath}',[ProductController::class,'sp']);

        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    });
    
});


Route::prefix('user')->name('user.')->group(function(){
    
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::post('check',[UserController::class,'check'])->name('check');
        Route::post('store',[UserController::class,'store'])->name('store');
        Route::view('login','user.user-auth')->name('login');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::get('/home',[UserController::class,'index'])->name('home');

        Route::get('img/{filpath}',[ProductController::class,'img']);

        Route::get('/logout',[UserController::class,'logout'])->name('logout');
    });
    
});
