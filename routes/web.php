<?php

use App\Http\Controllers\Admin\NewsController;
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

Route::get('/', function () {
    return view('backend.dashboard.index');
});

Route::get('news/index',[NewsController::class,'index'])->name('news.index');
Route::get('news/create',[NewsController::class,'create'])->name('news.create');
Route::post('news/store',[NewsController::class,'store'])->name('news.store');
Route::get('news/show/{id}',[NewsController::class,'show'])->name('news.show');
Route::get('news/edit/{id}',[NewsController::class,'edit'])->name('news.edit');
Route::put('news/update/{id}',[NewsController::class,'update'])->name('news.update');
Route::delete('news/destroy/{id}',[NewsController::class,'destroy'])->name('news.destroy');

Route::get('news/index',[NewsController::class,'index'])->name('news.index');
Route::get('news/create',[NewsController::class,'create'])->name('news.create');
Route::post('news/store',[NewsController::class,'store'])->name('news.store');
Route::get('news/show/{id}',[NewsController::class,'show'])->name('news.show');
Route::get('news/edit/{id}',[NewsController::class,'edit'])->name('news.edit');
Route::put('news/update/{id}',[NewsController::class,'update'])->name('news.update');
Route::delete('news/destroy/{id}',[NewsController::class,'destroy'])->name('news.destroy');


