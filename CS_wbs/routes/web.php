<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
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
    return view('frontend.index');
});

Route::group(['middleware' => 'locale'], function () {
    Route::get('change-language/{language}', [\App\Http\Controllers\LanguageController::class, 'changeLanguage'])->name('user.change-language');

    Route::prefix('/admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\LoginAdmin::class, 'showLogin'])->name('showlogin.admin');
        Route::post('login', [\App\Http\Controllers\LoginAdmin::class, 'checkLogin'])->name('checklogin.admin');
        Route::get('logout', [\App\Http\Controllers\LoginAdmin::class, 'logout'])->name('logout');

        Route::middleware('AuthAdmin')->group(function () {
            Route::prefix("author")->group(function () {
                Route::get('/', [AuthorController::class, 'index'])->name('author.list');
                Route::get('create', [AuthorController::class, 'create'])->name('author.create');
                Route::post('store', [AuthorController::class, 'store'])->name('author.store');
                Route::get('edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
                Route::post('edit/{id}', [AuthorController::class, 'update'])->name('author.update');
                Route::get('delete/{id}', [AuthorController::class, 'destroy'])->name('author.delete');
            });
            Route::prefix('category')->group(function () {
                Route::get('/', [CategoryController::class, 'index'])->name('category.index');
                Route::get('/add', [CategoryController::class, 'create'])->name('category.create');
                Route::post('/add', [CategoryController::class, 'store'])->name('category.store');
                Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
                Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
                Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
                Route::get('/{id}/detail', [CategoryController::class, 'show'])->name('category.detail');
            });
            Route::prefix('book')->group(function () {
                Route::get('/', [BookController::class, 'index'])->name('book.list');
                Route::get('/{id}/detail', [BookController::class, 'show'])->name('book.detail');
                Route::get('add', [BookController::class, 'create'])->name('book.add');
                Route::get('edit/{id}', [BookController::class, 'edit'])->name('book.edit');
                Route::post('edit/{id}', [BookController::class, 'update'])->name('book.update');
                Route::post('store', [BookController::class, 'store'])->name('book.store');
                Route::get('/delete/{id}', [BookController::class, 'destroy'])->name('book.delete');
            });
            Route::prefix('customer')->group(function () {
                Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
                Route::get('/add', [CustomerController::class, 'create'])->name('customer.create');
                Route::post('/add', [CustomerController::class, 'store'])->name('customer.store');
                Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
                Route::post('/edit/{id}', [CustomerController::class, 'update'])->name('customer.update');
                Route::get('/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
            });
        });
    });
});
