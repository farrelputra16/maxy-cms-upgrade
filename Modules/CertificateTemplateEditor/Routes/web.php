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
use Modules\CertificateTemplateEditor\Http\Controllers\CertificateTemplateEditorController;

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('certificate')->name('certificate.')->group(function () {
        Route::get('/', [CertificateTemplateEditorController::class, 'index'])->name('index');
        Route::post('/save', [CertificateTemplateEditorController::class, 'save'])->name('save');

        Route::post('/set-bg-image', [CertificateTemplateEditorController::class, 'setBackgroundImage'])->name('set-bg-image');

    });
});
