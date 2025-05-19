<?php

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

use Illuminate\Support\Facades\Route;
use Modules\DonationTracker\Http\Controllers\DonationTrackerController;
use Modules\DonationTracker\Http\Controllers\DonatorController;
use Modules\DonationTracker\Http\Controllers\MyDonationController;
use Modules\DonationTracker\Http\Controllers\ReportController;
use Modules\DonationTracker\Http\Controllers\SponsoredListController;

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('donation')->name('donation.')->group(function () {
        Route::get('/', [DonationTrackerController::class, 'index'])->name('index');
        Route::get('/data', [DonationTrackerController::class, 'getData'])->name('getData');

        Route::get('/add', [DonationTrackerController::class, 'getAdd'])->name('getAdd');
        Route::post('/add', [DonationTrackerController::class, 'postAdd'])->name('postAdd');

        Route::get('/edit', [DonationTrackerController::class, 'getEdit'])->name('getEdit');
        Route::post('/edit', [DonationTrackerController::class, 'postEdit'])->name('postEdit');
    });

    Route::prefix('donator')->name('donator.')->group(function () {
        Route::get('/', [DonatorController::class, 'index'])->name('index');
        Route::get('/data', [DonatorController::class, 'getData'])->name('getData');

        Route::get('/add', [DonatorController::class, 'getAdd'])->name('getAdd');
        Route::post('/add', [DonatorController::class, 'postAdd'])->name('postAdd');

        Route::get('/edit', [DonatorController::class, 'getEdit'])->name('getEdit');
        Route::post('/edit', [DonatorController::class, 'postEdit'])->name('postEdit');

        Route::prefix('sponsored-list')->name('sponsored-list.')->group(function () {
            Route::get('/', [SponsoredListController::class, 'index'])->name('index');
            Route::get('/data', [SponsoredListController::class, 'getData'])->name('getData');

            Route::get('/add', [SponsoredListController::class, 'getAdd'])->name('getAdd');
            Route::post('/add', [SponsoredListController::class, 'postAdd'])->name('postAdd');

            Route::get('/edit', [SponsoredListController::class, 'getEdit'])->name('getEdit');
            Route::post('/edit', [SponsoredListController::class, 'postEdit'])->name('postEdit');
        });

        Route::prefix('report')->name('report.')->group(function () {
            Route::get('/', [ReportController::class, 'index'])->name('index');
            Route::get('/data', [ReportController::class, 'getData'])->name('getData');

            Route::get('/add', [ReportController::class, 'getAdd'])->name('getAdd');
            Route::post('/add', [ReportController::class, 'postAdd'])->name('postAdd');

            Route::get('/edit', [ReportController::class, 'getEdit'])->name('getEdit');
            Route::post('/edit', [ReportController::class, 'postEdit'])->name('postEdit');
        });
    });

    Route::prefix('my-donation')->name('my-donation.')->group(function () {
        Route::get('/', [MyDonationController::class, 'index'])->name('index');
        Route::get('/data', [MyDonationController::class, 'getData'])->name('getData');
    });
});
