<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\AirportController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CulinaryController;
use App\Http\Controllers\Admin\EmergencyNumberController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\StationController;
use App\Http\Controllers\Admin\TerminalController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\TipsTrickController;
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


// auth
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');

Route::middleware('auth')->group(function () {

    Route::get('logout',[AuthController::class, 'logout'])->name('logout');

    // dashboard
    Route::get('/', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

    // about
    Route::get('about/index', [AboutController::class, 'index'])->name('about.index');
    Route::get('about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about/update/{id}', [AboutController::class, 'update'])->name('about.update');

    // news
    Route::get('news/index', [NewsController::class, 'index'])->name('news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('news.create');
    Route::post('news/store', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/show/{id}', [NewsController::class, 'show'])->name('news.show');
    Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('news.edit');
    Route::put('news/update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/destroy/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // announcement
    Route::get('announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');
    Route::get('announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::post('announcement/store', [AnnouncementController::class, 'store'])->name('announcement.store');
    Route::get('announcement/show/{id}', [AnnouncementController::class, 'show'])->name('announcement.show');
    Route::get('announcement/edit/{id}', [AnnouncementController::class, 'edit'])->name('announcement.edit');
    Route::put('announcement/update/{id}', [AnnouncementController::class, 'update'])->name('announcement.update');
    Route::delete('announcement/destroy/{id}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');

    // accommodation
    Route::get('accommodation/index', [AccommodationController::class, 'index'])->name('accommodation.index');
    Route::get('accommodation/create', [AccommodationController::class, 'create'])->name('accommodation.create');
    Route::post('accommodation/store', [AccommodationController::class, 'store'])->name('accommodation.store');
    Route::get('accommodation/show/{id}', [AccommodationController::class, 'show'])->name('accommodation.show');
    Route::get('accommodation/edit/{id}', [AccommodationController::class, 'edit'])->name('accommodation.edit');
    Route::put('accommodation/update/{id}', [AccommodationController::class, 'update'])->name('accommodation.update');
    Route::delete('accommodation/destroy/{id}', [AccommodationController::class, 'destroy'])->name('accommodation.destroy');

    // tour
    Route::get('tour/index', [TourController::class, 'index'])->name('tour.index');
    Route::get('tour/create', [TourController::class, 'create'])->name('tour.create');
    Route::post('tour/store', [TourController::class, 'store'])->name('tour.store');
    Route::get('tour/show/{id}', [TourController::class, 'show'])->name('tour.show');
    Route::get('tour/edit/{id}', [TourController::class, 'edit'])->name('tour.edit');
    Route::put('tour/update/{id}', [TourController::class, 'update'])->name('tour.update');
    Route::delete('tour/destroy/{id}', [TourController::class, 'destroy'])->name('tour.destroy');

    // culinary
    Route::get('culinary/index', [CulinaryController::class, 'index'])->name('culinary.index');
    Route::get('culinary/create', [CulinaryController::class, 'create'])->name('culinary.create');
    Route::post('culinary/store', [CulinaryController::class, 'store'])->name('culinary.store');
    Route::get('culinary/show/{id}', [CulinaryController::class, 'show'])->name('culinary.show');
    Route::get('culinary/edit/{id}', [CulinaryController::class, 'edit'])->name('culinary.edit');
    Route::put('culinary/update/{id}', [CulinaryController::class, 'update'])->name('culinary.update');
    Route::delete('culinary/destroy/{id}', [CulinaryController::class, 'destroy'])->name('culinary.destroy');

    // terminal
    Route::get('terminal/index', [TerminalController::class, 'index'])->name('terminal.index');
    Route::get('terminal/create', [TerminalController::class, 'create'])->name('terminal.create');
    Route::post('terminal/store', [TerminalController::class, 'store'])->name('terminal.store');
    Route::get('terminal/show/{id}', [TerminalController::class, 'show'])->name('terminal.show');
    Route::get('terminal/edit/{id}', [TerminalController::class, 'edit'])->name('terminal.edit');
    Route::put('terminal/update/{id}', [TerminalController::class, 'update'])->name('terminal.update');
    Route::delete('terminal/destroy/{id}', [TerminalController::class, 'destroy'])->name('terminal.destroy');

    // station
    Route::get('station/index', [StationController::class, 'index'])->name('station.index');
    Route::get('station/create', [StationController::class, 'create'])->name('station.create');
    Route::post('station/store', [StationController::class, 'store'])->name('station.store');
    Route::get('station/show/{id}', [StationController::class, 'show'])->name('station.show');
    Route::get('station/edit/{id}', [StationController::class, 'edit'])->name('station.edit');
    Route::put('station/update/{id}', [StationController::class, 'update'])->name('station.update');
    Route::delete('station/destroy/{id}', [StationController::class, 'destroy'])->name('station.destroy');

    // airport
    Route::get('airport/index', [AirportController::class, 'index'])->name('airport.index');
    Route::get('airport/create', [AirportController::class, 'create'])->name('airport.create');
    Route::post('airport/store', [AirportController::class, 'store'])->name('airport.store');
    Route::get('airport/show/{id}', [AirportController::class, 'show'])->name('airport.show');
    Route::get('airport/edit/{id}', [AirportController::class, 'edit'])->name('airport.edit');
    Route::put('airport/update/{id}', [AirportController::class, 'update'])->name('airport.update');
    Route::delete('airport/destroy/{id}', [AirportController::class, 'destroy'])->name('airport.destroy');

    // report
    Route::get('report/index', [ReportController::class, 'index'])->name('report.index');
    Route::get('report/show/{id}', [ReportController::class, 'show'])->name('report.show');
    Route::get('report/edit/{id}', [ReportController::class, 'editStatus'])->name('report.edit-status');
    Route::patch('report/update/{id}', [ReportController::class, 'updateStatus'])->name('report.update-status');
    Route::delete('report/destroy/{id}', [ReportController::class, 'destroy'])->name('report.destroy');

    // emergency numbers
    Route::get('emergency-numbers', [EmergencyNumberController::class, 'index'])->name('emergency.index');
    Route::get('emergency-numbers/create', [EmergencyNumberController::class, 'create'])->name('emergency.create');
    Route::post('emergency-numbers/store', [EmergencyNumberController::class, 'store'])->name('emergency.store');
    Route::get('emergency-numbers/show/{id}', [EmergencyNumberController::class, 'show'])->name('emergency.show');
    Route::get('emergency-numbers/edit/{id}', [EmergencyNumberController::class, 'edit'])->name('emergency.edit');
    Route::put('emergency-numbers/update/{id}', [EmergencyNumberController::class, 'update'])->name('emergency.update');
    Route::delete('emergency-numbers/destroy/{id}', [EmergencyNumberController::class, 'destroy'])->name('emergency.destroy');

    // tips & trick
    Route::get('tips-trick', [TipsTrickController::class, 'index'])->name('tips_trick.index');
    Route::get('tips-trick/create', [TipsTrickController::class, 'create'])->name('tips_trick.create');
    Route::post('tips-trick/store', [TipsTrickController::class, 'store'])->name('tips_trick.store');
    Route::get('tips-trick/show/{id}', [TipsTrickController::class, 'show'])->name('tips_trick.show');
    Route::get('tips-trick/edit/{id}', [TipsTrickController::class, 'edit'])->name('tips_trick.edit');
    Route::put('tips-trick/update/{id}', [TipsTrickController::class, 'update'])->name('tips_trick.update');
    Route::delete('tips-trick/destroy/{id}', [TipsTrickController::class, 'destroy'])->name('tips_trick.destroy');
});
