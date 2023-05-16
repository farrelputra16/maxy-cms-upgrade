<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
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
})->name('dashboard');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::get('/register', [AuthController::class, 'getRegister'])->name('register');

Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::post('/mycourse', [AuthController::class, 'postLogout'])->name('postLogout');

Route::get('/mycourse', [CourseController::class, 'getCourse'])->name('getCourse');
