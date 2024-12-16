<?php

use Modules\Enrollment\Http\Controllers\CourseClassMemberController;
use Modules\Enrollment\Http\Controllers\CourseClassMemberFinalScoreController;
use Modules\Enrollment\Http\Controllers\GenerateCertificateController;

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


// course class member route ############################################################################################
Route::get('/course/class/member', [CourseClassMemberController::class, 'getCourseClassMember'])->name('getCourseClassMember')->middleware('access:course_class_member_manage');
Route::get('/get-course-class-member-data', [CourseClassMemberController::class, 'getCourseClassMemberData'])->name('getCourseClassMemberData');

Route::get('/course/class/member/add', [CourseClassMemberController::class, 'getAddCourseClassMember'])->name('getAddCourseClassMember')->middleware('access:course_class_member_create');
Route::post('/course/class/member/add', [CourseClassMemberController::class, 'postAddCourseClassMember'])->name('postAddCourseClassMember')->middleware('access:course_class_member_create');

Route::get('/course/class/member/{course_class_member}/edit', [CourseClassMemberController::class, 'getEditCourseClassMember'])->name('getEditCourseClassMember')->middleware('access:course_class_member_update');
Route::post('/course/class/member/{course_class_member}/edit', [CourseClassMemberController::class, 'postEditCourseClassMember'])->name('postEditCourseClassMember')->middleware('access:course_class_member_update');

// Import File .csv
Route::post('/course-class-member/import-csv', [CourseClassMemberController::class, 'importCSV'])->name('course-class-member.import-csv');

Route::prefix('enrollment')->group(function () {
    Route::get('/', 'EnrollmentController@index');
});

Route::get('/course/class/member/{course_class_member}/generate-certificate/user/{user}/class/{course_class}', [GenerateCertificateController::class, 'getGenerateCertificate'])->name('getGenerateCertificate');
