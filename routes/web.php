<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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
Route::middleware('admin')->group(function(){
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/create', [ProductController::class, 'store'])->name('product.store');
    
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/edit{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destory'])->name('product.destroy');

    Route::middleware('auth')->group(function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::middleware('guest')->group(function(){
            Route::get('/', [AppController::class, 'index'])->name('home.page');
            Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
            Route::get('/login', [LoginController::class, 'login'])->name('login.page');
            Route::post('/login', [LoginController::class, 'store'])->name('login');
            
            Route::get('/register', [RegisterController::class, 'register'])->name('register.page');
            Route::post('/register', [RegisterController::class, 'store'])->name('register');
        });
    });
});