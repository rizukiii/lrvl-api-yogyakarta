<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AnnouncementController;
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

Route::get('about/index',[AboutController::class,'index'])->name('about.index');
Route::get('about/edit/{id}',[AboutController::class,'edit'])->name('about.edit');
Route::put('about/update/{id}',[AboutController::class,'update'])->name('about.update');


Route::get('news/index',[NewsController::class,'index'])->name('news.index');
Route::get('news/create',[NewsController::class,'create'])->name('news.create');
Route::post('news/store',[NewsController::class,'store'])->name('news.store');
Route::get('news/show/{id}',[NewsController::class,'show'])->name('news.show');
Route::get('news/edit/{id}',[NewsController::class,'edit'])->name('news.edit');
Route::put('news/update/{id}',[NewsController::class,'update'])->name('news.update');
Route::delete('news/destroy/{id}',[NewsController::class,'destroy'])->name('news.destroy');

Route::get('announcement/index',[AnnouncementController::class,'index'])->name('announcement.index');
Route::get('announcement/create',[AnnouncementController::class,'create'])->name('announcement.create');
Route::post('announcement/store',[AnnouncementController::class,'store'])->name('announcement.store');
Route::get('announcement/show/{id}',[AnnouncementController::class,'show'])->name('announcement.show');
Route::get('announcement/edit/{id}',[AnnouncementController::class,'edit'])->name('announcement.edit');
Route::put('announcement/update/{id}',[AnnouncementController::class,'update'])->name('announcement.update');
Route::delete('announcement/destroy/{id}',[AnnouncementController::class,'destroy'])->name('announcement.destroy');


