<?php

use Modules\Enrollment\Http\Controllers\CourseClassMemberController;
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

Route::get('/course/class/member/add', [CourseClassMemberController::class, 'getAddCourseClassMember'])->name('getAddCourseClassMember')->middleware('access:course_class_member_create');
Route::post('/course/class/member/add', [CourseClassMemberController::class, 'postAddCourseClassMember'])->name('postAddCourseClassMember')->middleware('access:course_class_member_create');

Route::get('/course/class/member/edit', [CourseClassMemberController::class, 'getEditCourseClassMember'])->name('getEditCourseClassMember')->middleware('access:course_class_member_update');
Route::post('/course/class/member/edit', [CourseClassMemberController::class, 'postEditCourseClassMember'])->name('postEditCourseClassMember')->middleware('access:course_class_member_update');

// Import File .csv
Route::post('/course-class-member/import-csv', [CourseClassMemberController::class, 'importCSV'])->name('course-class-member.import-csv');

Route::prefix('enrollment')->group(function () {
    Route::get('/', 'EnrollmentController@index');
});

// Generate Sertificate

Route::get('/generate-certificate/{course_class_member}',[CourseClassMemberController::class, 'getCertificate'])->name('getCertificate')->middleware('access:course_class_member_manage');
