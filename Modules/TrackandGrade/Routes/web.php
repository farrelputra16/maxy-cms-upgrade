<?php
use Modules\TrackandGrade\Http\Controllers\CourseClassMemberGradingController;
use Modules\TrackandGrade\Http\Controllers\CourseClassMemberLogController;

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

Route::prefix('trackandgrade')->group(function() {
    Route::get('/', 'TrackandGradeController@index');
});


Route::get('/course/class/member/history', [CourseClassMemberLogController::class, 'getCCMH'])->name('getCCMH')->middleware('access:course_class_member_log_read');
Route::get('/course/class/member/history/course_name', [CourseClassMemberLogController::class, 'getnameCCMH'])->name('getnameCCMH')->middleware('access:course_class_member_log_read');



Route::get('/course/class/member/historygrade', [CourseClassMemberGradingController::class, 'getCCMHGrade'])->name('getCCMHGrade')->middleware('access:course_class_member_grading_manage');
Route::get('/course/class/member/history/grade', [CourseClassMemberGradingController::class, 'getGradeCCMH'])->name('getGradeCCMH')->middleware('access:course_class_member_grading_manage');

Route::get('/course/class/member/history/edit', [CourseClassMemberGradingController::class, 'getEditCCMH'])->name('getEditCCMH')->middleware('access:course_class_member_grading_update');
Route::post('/course/class/member/history/edit', [CourseClassMemberGradingController::class, 'postEditCCMH'])->name('postEditCCMH')->middleware('access:course_class_member_grading_update');

