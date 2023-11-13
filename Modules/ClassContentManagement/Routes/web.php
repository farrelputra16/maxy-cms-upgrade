<?php

use Modules\ClassContentManagement\Http\Controllers\ClassContentManagementController;
use Modules\ClassContentManagement\Http\Controllers\CourseClassController;

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

Route::get('/test-module', [ClassContentManagementController::class, 'index']);

Route::get('/course/class', [CourseClassController::class, 'getCourseClass'])->name('getCourseClass')->middleware('access:course_class_manage');

Route::get('/course/class/duplicate', [CourseClassController::class, 'getDuplicateCourseClass'])->name('getDuplicateCourseClass')->middleware('access:course_class_create');
Route::post('/course/class/duplicate', [CourseClassController::class, 'postDuplicateCourseClass'])->name('postDuplicateCourseClass')->middleware('access:course_class_create');

Route::get('/course/class/add', [CourseClassController::class, 'getAddCourseClass'])->name('getAddCourseClass')->middleware('access:course_class_create');
Route::post('/course/class/add', [CourseClassController::class, 'postAddCourseClass'])->name('postAddCourseClass')->middleware('access:course_class_create');

Route::get('/course/class/edit', [CourseClassController::class, 'getEditCourseClass'])->name('getEditCourseClass')->middleware('access:course_class_update');
Route::post('/course/class/edit', [CourseClassController::class, 'postEditCourseClass'])->name('postEditCourseClass')->middleware('access:course_class_update');


Route::prefix('ClassContentManagement')->group(function() {
    Route::get('/', 'ClassContentManagementController@index');
});