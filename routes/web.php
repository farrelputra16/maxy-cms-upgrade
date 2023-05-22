<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::get('/register', [AuthController::class, 'getRegister'])->name('register');

Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::post('/logout', [AuthController::class, 'postLogout'])->name('logout');

// dashboard route
Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('getDashboard');

// course route
Route::get('/course', [CourseController::class, 'getCourse'])->name('getCourse');

Route::get('/course/add', [CourseController::class, 'getAddCourse'])->name('getAddCourse');

Route::get('/course/edit', [CourseController::class, 'getEditCourse'])->name('getEditCourse');
Route::post('/course/edit', [CourseController::class, 'postEditCourse'])->name('postEditCourse');

Route::get('/course/delete', [CourseController::class, 'getDeleteCourse'])->name('getDeleteCourse');
Route::post('/course/delete', [CourseController::class, 'postDeleteCourse'])->name('postDeleteCourse');
Route::post('/course', [CourseController::class, 'postAddCourse'])->name('submit.course');