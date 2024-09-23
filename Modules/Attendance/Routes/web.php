<?php

use Modules\Attendance\Http\Controllers\AttendanceController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/course/class/attendance', [AttendanceController::class, 'getCourseClassAttendance'])->name('getCourseClassAttendance');
Route::get('/course/class/attendance/add', [AttendanceController::class, 'getAddCourseClassAttendance'])->name('getAddCourseClassAttendance');
Route::post('/course/class/attendance/add', [AttendanceController::class, 'postAddCourseClassAttendance'])->name('postAddCourseClassAttendance');
Route::get('/course/class/attendance/edit', [AttendanceController::class, 'getEditCourseClassAttendance'])->name('getEditCourseClassAttendance');
Route::post('/course/class/attendance/edit', [AttendanceController::class, 'postEditCourseClassAttendance'])->name('postEditCourseClassAttendance');

// member attendance
Route::get('/course/class/attendance/member', [AttendanceController::class, 'getMemberAttendance'])->name('getMemberAttendance');
Route::get('/course/class/attendance/member/add', [AttendanceController::class, 'getAddMemberAttendance'])->name('getAddMemberAttendance');
Route::post('/course/class/attendance/member/add', [AttendanceController::class, 'postAddMemberAttendance'])->name('postAddMemberAttendance');
Route::get('/course/class/attendance/member/edit', [AttendanceController::class, 'getEditMemberAttendance'])->name('getEditMemberAttendance');
Route::post('/course/class/attendance/member/edit', [AttendanceController::class, 'postEditMemberAttendance'])->name('postEditMemberAttendance');

Route::prefix('attendance')->group(function() {
    Route::get('/', 'AttendanceController@index');
});
