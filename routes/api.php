<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\VerifyEmailController;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\AccommodationController;
use App\Http\Controllers\Api\AirportController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\CulinaryController;
use App\Http\Controllers\Api\EmergencyNumberController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\StationController;
use App\Http\Controllers\Api\TerminalController;
use App\Http\Controllers\Api\TipsTrickController;
use App\Http\Controllers\Api\TourController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// auth
Route::post('register', RegisterController::class);
Route::get('email/verify/{id}/{hash}', [VerifyEmailController::class, 'verifyEmail'])->name('verification.verify');
Route::post('email/resend', [VerifyEmailController::class, 'resendVerificationEmail']);
Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class);
// Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
// Route::post('reset-password', [ForgotPasswordController::class, 'resetPassword']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// news
Route::get('news/all', [NewsController::class, 'index']);
Route::post('news/store', [NewsController::class, 'store']);
Route::get('news/detail/{id}', [NewsController::class, 'show']);
Route::put('news/update/{id}', [NewsController::class, 'update']);
Route::delete('news/destroy/{id}', [NewsController::class, 'destroy']);

// announcement
Route::get('announcement/all', [AnnouncementController::class, 'fetchAll']);
Route::get('announcement/detail/{id}', [AnnouncementController::class, 'fetchSingle']);

// tips & trik
Route::get('tips_trik/all',[TipsTrickController::class, 'index']);
Route::post('tips_trik/store',[TipsTrickController::class, 'store']);
Route::get('tips_trik/detail/{id}',[TipsTrickController::class, 'show']);
Route::put('tips_trik/update/{id}',[TipsTrickController::class, 'update']);
Route::delete('tips_trik/destroy/{id}',[TipsTrickController::class, 'destroy']);

// nomor darurat
Route::get('emergency_number/all',[EmergencyNumberController::class, 'index']);
Route::get('emergency_number/detail/{id}',[EmergencyNumberController::class, 'show']);

// about
Route::get('about/all', [AboutController::class, 'fetchAll']);

// accommodation
Route::get('accommodation/all', [AccommodationController::class, 'fetchAll']);
Route::get('accommodation/detail/{id}', [AccommodationController::class, 'fetchSingle']);

// tour
Route::get('tour/all',[TourController::class, 'index']);
Route::get('tour/detail/{id}',[TourController::class, 'show']);

// culinary
Route::get('culinary/all',[CulinaryController::class, 'index']);
Route::get('culinary/detail/{id}',[CulinaryController::class, 'show']);

// terminal
Route::get('terminal/all',[TerminalController::class, 'index']);
Route::get('terminal/detail/{id}',[TerminalController::class, 'show']);

// station
Route::get('station/all',[StationController::class, 'index']);
Route::get('station/detail/{id}',[StationController::class, 'show']);

// airport
Route::get('airport/all',[AirportController::class, 'index']);
Route::get('airport/detail/{id}',[AirportController::class, 'show']);

// report
Route::get('report/all',[ReportController::class, 'index']);
Route::post('report/store',[ReportController::class, 'store']);
Route::get('report/detail/{id}',[ReportController::class, 'show']);
Route::put('report/update/{id}',[ReportController::class, 'update']);
Route::delete('report/destroy/{id}',[ReportController::class, 'destroy']);


