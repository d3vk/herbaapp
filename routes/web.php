<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Merchant;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['isAdmin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'admin'])->name('admin.index');

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
            Route::post('/create', [UserController::class, 'store'])->name('admin.users.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
            Route::post('/delete/{id}',[UserController::class, 'destroy'])->name('admin.users.delete');
        });
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');