<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('admin')->as('admin.')->middleware('auth')->group(function () {

    // routes permitted only for super admin
    Route::middleware('super_admin')->group(function () {
        Route::get('blog/create', [PostController::class, 'create'])->middleware('super_admin')->name('blog.create');
        Route::resource('user', UserController::class);
        Route::resource('owner', OwnerController::class);
    });

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('blog', PostController::class)->except('create');
});

Route::get('/', fn () => redirect()->route('admin.home'));

Auth::routes();
