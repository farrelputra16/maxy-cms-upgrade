<?php

use Modules\ClassContentManagement\Http\Controllers\ClassContentManagementController;
use Modules\ClassContentManagement\Http\Controllers\CourseClassController;
use Modules\ClassContentManagement\Http\Controllers\CourseClassModuleController;
use Modules\ClassContentManagement\Http\Controllers\AttendanceController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/test-module', [ClassContentManagementController::class, 'index']);
// course class
Route::get('/course/class', [CourseClassController::class, 'getCourseClass'])->name('getCourseClass')->middleware('access:course_class_manage');

Route::get('/course/class/generate-student-attendance', [CourseClassController::class, 'generateAttendanceAllClass'])->name('generateAttendanceAllClass')->middleware('access:course_class_manage');

Route::get('/course/class/duplicate', [CourseClassController::class, 'getDuplicateCourseClass'])->name('getDuplicateCourseClass')->middleware('access:course_class_create');
Route::post('/course/class/duplicate', [CourseClassController::class, 'postDuplicateCourseClass'])->name('postDuplicateCourseClass')->middleware('access:course_class_create');

Route::get('/course/class/add', [CourseClassController::class, 'getAddCourseClass'])->name('getAddCourseClass')->middleware('access:course_class_create');
Route::post('/course/class/add', [CourseClassController::class, 'postAddCourseClass'])->name('postAddCourseClass')->middleware('access:course_class_create');

Route::get('/course/class/edit', [CourseClassController::class, 'getEditCourseClass'])->name('getEditCourseClass')->middleware('access:course_class_update');
Route::post('/course/class/edit', [CourseClassController::class, 'postEditCourseClass'])->name('postEditCourseClass')->middleware('access:course_class_update');

Route::delete('/course/class/delete', [CourseClassController::class, 'deleteCourseClass'])->name('deleteCourseClass')->middleware('access:course_class_delete');

Route::get('/course/class/scoring', [CourseClassController::class, 'getCourseClassScoring'])->name('getCourseClassScoring')->middleware('access:course_class_update');
Route::post('/course/class/scoring', [CourseClassController::class, 'postCourseClassScoring'])->name('postCourseClassScoring')->middleware('access:course_class_update');

// course class module
Route::get('/course/class/module', [CourseClassModuleController::class, 'getCourseClassParentModule'])->name('getCourseClassModule')->middleware('access:course_class_module_manage');
Route::get('/course/class/module/add', [CourseClassModuleController::class, 'getAddCourseClassModule'])->name('getAddCourseClassModule')->middleware('access:course_class_module_create');
Route::post('/course/class/module/add', [CourseClassModuleController::class, 'postAddCourseClassModule'])->name('postAddCourseClassModule')->middleware('access:course_class_module_create');
Route::get('/course/class/module/edit', [CourseClassModuleController::class, 'getEditCourseClassModule'])->name('getEditCourseClassModule')->middleware('access:course_class_module_update');
Route::post('/course/class/module/edit', [CourseClassModuleController::class, 'postEditCourseClassModule'])->name('postEditCourseClassModule')->middleware('access:course_class_module_update');

Route::get('/courseclassmodule/child', [CourseClassModuleController::class, 'getCourseClassChildModule'])->name('getCourseClassChildModule')->middleware('access:course_class_module_manage');

Route::get('/courseclassmodule/child/add', [CourseClassModuleController::class, 'getAddCourseClassChildModule'])->name('getAddCourseClassChildModule')->middleware('access:course_class_module_create');
Route::post('/courseclassmodule/child/add', [CourseClassModuleController::class, 'postAddCourseClassChildModule'])->name('postAddCourseClassChildModule')->middleware('access:course_class_module_create');

Route::get('/courseclassmodule/child/edit', [CourseClassModuleController::class, 'getEditCourseClassChildModule'])->name('getEditCourseClassChildModule')->middleware('access:course_class_module_update');
Route::post('/courseclassmodule/child/edit', [CourseClassModuleController::class, 'postEditCourseClassChildModule'])->name('postEditCourseClassChildModule')->middleware('access:course_class_module_update');

Route::get('/courseclassmodule/child/journal', [CourseClassModuleController::class, 'getJournalCourseClassChildModule'])->name('getJournalCourseClassChildModule')->middleware('access:course_class_module_journal_manage');
Route::get('/courseclassmodule/child/journal/create', [CourseClassModuleController::class, 'getAddJournalCourseClassChildModule'])->name('getAddJournalCourseClassChildModule')->middleware('access:course_class_module_journal_create');
Route::post('/courseclassmodule/child/journal/create', [CourseClassModuleController::class, 'postAddJournalCourseClassChildModule'])->name('postAddJournalCourseClassChildModule')->middleware('access:course_class_module_journal_create');
Route::post('/courseclassmodule/child/journal/reject', [CourseClassModuleController::class, 'postRejectJournalCourseClassChildModule'])->name('postRejectJournalCourseClassChildModule')->middleware('access:course_class_module_journal_update');
Route::post('/courseclassmodule/child/journal/delete', [CourseClassModuleController::class, 'postDeleteJournalCourseClassChildModule'])->name('postDeleteJournalCourseClassChildModule')->middleware('access:course_class_module_journal_delete');

Route::delete('/courseclassmodule/delete/{id}', [CourseClassModuleController::class, 'deleteCourseClassModule'])
    ->name('deleteCourseClassModule')
    ->middleware('access:course_class_module_delete');

Route::prefix('ClassContentManagement')->group(function () {
    Route::get('/', 'ClassContentManagementController@index');
});
