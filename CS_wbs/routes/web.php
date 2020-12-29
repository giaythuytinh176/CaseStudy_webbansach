<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
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
//
//Route::get('/', function () {
//    return view('backend.category.list');
//});

Route::prefix('/admin')->group(function () {
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
    });
    Route::prefix('book')->group(function () {
        Route::get('/', [\App\Http\Controllers\BookController::class, 'index'])->name('book.list');
        Route::get('/{id}/detailbook', [\App\Http\Controllers\BookController::class, 'show'])->name('book.detail');
        Route::get('add', [\App\Http\Controllers\BookController::class, 'create'])->name('book.add');
        Route::post('store', [\App\Http\Controllers\BookController::class, 'store'])->name('book.store');



    });
});
