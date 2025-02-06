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
use Modules\Report\Http\Controllers\ReportController;

Route::prefix('report')->name('report.')->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('/data', [ReportController::class, 'getUserReportData'])->name('getData');
        Route::get('/add', [ReportController::class, 'getAdd'])->name('getAdd');
        Route::post('/add', [ReportController::class, 'postAdd'])->name('postAdd');
        Route::get('/edit', [ReportController::class, 'getEdit'])->name('getEdit');
        Route::post('/edit', [ReportController::class, 'postEdit'])->name('postEdit');
    });
});
