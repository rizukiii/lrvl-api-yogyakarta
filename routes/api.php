<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AccommodationController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\NewsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', RegisterController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('logout',LogoutController::class)->name('logout');

Route::get('about/fetchAll',[AboutController::class, 'fetchAll']);

Route::get('news/fetchAll',[NewsController::class, 'fetchAll']);
Route::get('news/fetchSingle/{id}',[NewsController::class, 'fetchSingle']);

Route::get('announcement/fetchAll',[AnnouncementController::class, 'fetchAll']);
Route::get('announcement/fetchSingle/{id}',[AnnouncementController::class, 'fetchSingle']);

Route::get('accommodation/fetchAll',[AccommodationController::class, 'fetchAll']);
Route::get('accommodation/fetchSingle/{id}',[AccommodationController::class, 'fetchSingle']);
