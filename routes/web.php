<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\User\ProductController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthenController::class, 'login'])->name('login');
Route::post('login', [AuthenController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthenController::class, 'logout'])->name('logout');
Route::get('register', [AuthenController::class, 'register'])->name('register');
Route::post('register', [AuthenController::class, 'postRegister'])->name('postRegister');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'checkAdmin'
], function(){
    Route::group([
        'prefix' => 'books',
        'as' => 'books.'
    ], function(){
        Route::get('/', [BookController::class, 'listBook'])->name('listBook');
    });
});

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
], function(){
    Route::group([
        'prefix' => 'books',
        'as' => 'books.'
    ], function(){
        Route::get('/', [ProductController::class, 'home'])->name('home');
    });
});

