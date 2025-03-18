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
use Modules\RedeemCode\Http\Controllers\RedeemCodeClassListController;
use Modules\RedeemCode\Http\Controllers\RedeemCodeController;

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('redeem-code')->name('redeemCode.')->group(function () {
        Route::get('/', [RedeemCodeController::class, 'index'])->name('index')->middleware('access:redeem_code_manage');
        Route::get('/data', [RedeemCodeController::class, 'getData'])->name('getData');

        Route::get('/add', [RedeemCodeController::class, 'getAdd'])->name('getAdd')->middleware('access:redeem_code_create');
        Route::post('/add', [RedeemCodeController::class, 'postAdd'])->name('postAdd')->middleware('access:redeem_code_create');

        Route::get('/edit', [RedeemCodeController::class, 'getEdit'])->name('getEdit')->middleware('access:redeem_code_update');
        Route::post('/edit', [RedeemCodeController::class, 'postEdit'])->name('postEdit')->middleware('access:redeem_code_update');

        Route::prefix('class')->name('class.')->group(function () {
            Route::get('/', [RedeemCodeClassListController::class, 'index'])->name('index');
            Route::get('/data', [RedeemCodeClassListController::class, 'getData'])->name('getData');

            Route::get('/add', [RedeemCodeClassListController::class, 'getAdd'])->name('getAdd');
            Route::post('/add', [RedeemCodeClassListController::class, 'postAdd'])->name('postAdd');

            Route::get('/delete', [RedeemCodeClassListController::class, 'postDelete'])->name('postDelete');
        });
    });
});
