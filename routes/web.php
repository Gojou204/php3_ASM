<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\User\DashboardController;
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
        // CRUD books
        Route::get('/', [BookController::class, 'listBook'])->name('listBook');
        Route::get('add-book', [BookController::class, 'addBook'])->name('addBook');
        Route::post('add-book', [BookController::class, 'addPostBook'])->name('addPostBook');
        Route::delete('/{book_id}', [BookController::class, 'deleteBook'])->name('deleteBook');
        Route::get('update-book/{book_id}', [BookController::class, 'updateBook'])->name('updateBook');
        Route::patch('update-book/{book_id}', [BookController::class, 'updatePatchBook'])->name('updatePatchBook');
    });

    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.'
    ], function(){
        // CRUD books
        Route::get('/', [CategoryController::class, 'listCategory'])->name('listCategory');
        Route::get('add-category', [CategoryController::class, 'addCategory'])->name('addCategory');
        Route::post('add-category', [CategoryController::class, 'addPostCategory'])->name('addPostCategory');
        Route::delete('/{category_id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
        Route::get('update-category/{category_id}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::patch('update-category/{category_id}', [CategoryController::class, 'updatePatchCategory'])->name('updatePatchCategory');
    });

    Route::group([
        'prefix' => 'users',
        'as' => 'users.'
    ], function(){
        // CRUD books
        Route::get('/', [UserController::class, 'listUser'])->name('listUser');
        Route::get('add-users', [UserController::class, 'addUser'])->name('addUser');
        Route::post('add-users', [UserController::class, 'addPostUser'])->name('addPostUser');
        Route::delete('/{users_id}', [UserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('update-users/{users_id}', [UserController::class, 'updateUser'])->name('updateUser');
        Route::patch('update-users/{users_id}', [UserController::class, 'updatePatchUser'])->name('updatePatchUser');
    });
});

Route::group([
    'prefix' => 'users',
    'as' => 'users.',
], function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

