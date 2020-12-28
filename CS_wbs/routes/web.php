<?php

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
    return view('backend.home');
});
Route::prefix('admin')->group(function(){
    Route::get('list',[\App\Http\Controllers\AuthorController::class,'index'])->name('admin.list');
    Route::get('create',[\App\Http\Controllers\AuthorController::class,'create'])->name('admin.create');
    Route::post('store',[\App\Http\Controllers\AuthorController::class,'store'])->name('admin.store');
});
