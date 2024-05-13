<?php
use Modules\Form\Http\Controllers\FormController;

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

// Course Module
Route::get('/course/module/child/form', [FormController::class, 'getCMForm'])->name('getCMForm')->middleware('access:course_module_manage');
Route::get('/course/module/child/form/edit', [FormController::class, 'getEditCMForm'])->name('getEditCMForm')->middleware('access:course_module_manage');
Route::post('/course/module/child/form/edit', [FormController::class, 'postEditCMForm'])->name('postEditCMForm')->middleware('access:course_module_manage');
Route::get('/course/module/child/form/add', [FormController::class, 'getAddCMForm'])->name('getAddCMForm')->middleware('access:course_module_manage');
Route::post('/course/module/child/form/add', [FormController::class, 'postAddCMForm'])->name('postAddCMForm')->middleware('access:course_module_manage');

Route::get('/course/class/module/child/form', [FormController::class, 'getCCModForm'])->name('getCCModForm');
