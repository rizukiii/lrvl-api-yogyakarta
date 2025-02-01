<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\CulinaryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\TourController;
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

Route::get('accommodation/index',[AccommodationController::class,'index'])->name('accommodation.index');
Route::get('accommodation/create',[AccommodationController::class,'create'])->name('accommodation.create');
Route::post('accommodation/store',[AccommodationController::class,'store'])->name('accommodation.store');
Route::get('accommodation/show/{id}',[AccommodationController::class,'show'])->name('accommodation.show');
Route::get('accommodation/edit/{id}',[AccommodationController::class,'edit'])->name('accommodation.edit');
Route::put('accommodation/update/{id}',[AccommodationController::class,'update'])->name('accommodation.update');
Route::delete('accommodation/destroy/{id}',[AccommodationController::class,'destroy'])->name('accommodation.destroy');

Route::get('tour/index',[TourController::class,'index'])->name('tour.index');
Route::get('tour/create',[TourController::class,'create'])->name('tour.create');
Route::post('tour/store',[TourController::class,'store'])->name('tour.store');
Route::get('tour/show/{id}',[TourController::class,'show'])->name('tour.show');
Route::get('tour/edit/{id}',[TourController::class,'edit'])->name('tour.edit');
Route::put('tour/update/{id}',[TourController::class,'update'])->name('tour.update');
Route::delete('tour/destroy/{id}',[TourController::class,'destroy'])->name('tour.destroy');

Route::get('culinary/index',[CulinaryController::class,'index'])->name('culinary.index');
Route::get('culinary/create',[CulinaryController::class,'create'])->name('culinary.create');
Route::post('culinary/store',[CulinaryController::class,'store'])->name('culinary.store');
Route::get('culinary/show/{id}',[CulinaryController::class,'show'])->name('culinary.show');
Route::get('culinary/edit/{id}',[CulinaryController::class,'edit'])->name('culinary.edit');
Route::put('culinary/update/{id}',[CulinaryController::class,'update'])->name('culinary.update');
Route::delete('culinary/destroy/{id}',[CulinaryController::class,'destroy'])->name('culinary.destroy');


