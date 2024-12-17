<?php

use Modules\TrackandGrade\Http\Controllers\CourseClassMemberGradingController;
use Modules\TrackandGrade\Http\Controllers\CourseClassMemberLogController;
use Illuminate\Support\Facades\Route;

Route::prefix('trackandgrade')->group(function () {
    Route::get('/', 'TrackandGradeController@index');
});

Route::get('/course/class/member/history/data', [CourseClassMemberLogController::class, 'getCCMHData'])->name('getCCMHData');

Route::get('/course/class/member/history', [CourseClassMemberLogController::class, 'getCCMH'])->name('getCCMH')->middleware('access:course_class_member_log_read');
// Route::get('/course/class/member/history/json', [CourseClassMemberLogController::class, 'getCCMHajax'])->name('getCCMHajax')->middleware('access:course_class_member_log_read');


Route::get('/course/class/member/history/serverside/COBAA', [CourseClassMemberLogController::class, 'getCCMHCOBA'])->name('getCCMHCOBA')->middleware('access:course_class_member_log_read');


// Grade Assignment

Route::get('/grading', [CourseClassMemberGradingController::class, 'getGrade'])->name('getGrade')->middleware('access:course_class_member_grading_manage');

Route::get('/grading/data', [CourseClassMemberGradingController::class, 'getGradeData'])->name('getGradeData')->middleware('access:course_class_member_grading_manage');

Route::get('/grading/edit', [CourseClassMemberGradingController::class, 'getEditGrade'])->name('getEditGrade')->middleware('access:course_class_member_grading_update');
Route::post('/grading/post', [CourseClassMemberGradingController::class, 'postEditGrade'])->name('postEditGrade')->middleware('access:course_class_member_grading_update');


// Member History

Route::get('/course/class/member/history/course_name', [CourseClassMemberLogController::class, 'getnameCCMH'])->name('getnameCCMH')->middleware('access:course_class_member_log_read');

Route::post('/course/class/member/history/add', [CourseClassMemberGradingController::class, 'addCCMH'])->name('addCCMH');
Route::match(['get', 'post'], '/course/class/member/history/added', [CourseClassMemberGradingController::class, 'postAddCCMH'])->name('postAddCCMH');


// Generate Certificate
// Route::get('/generate-certificate/{course_class_member_grading}',[CourseClassMemberGradingController::class, 'getCertificate'])->name('getCertificate')->middleware('access:course_class_member_grading_manage');
