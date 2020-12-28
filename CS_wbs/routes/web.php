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

Route::get('/', function () {
    return view('backend.category.list');
});

Route::prefix('/admin')->group(function (){
    Route::prefix("author")->group(function () {
        Route::get('list',[AuthorController::class,'index'])->name('author.list');
        Route::get('create',[AuthorController::class,'create'])->name('author.create');
        Route::post('store',[AuthorController::class,'store'])->name('author.store');
    });
    Route::prefix('category')->group(function (){
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/add', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/add', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
    });
});
