<?php
use Modules\Quiz\Http\Controllers\QuizController;

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

// Route::prefix('quiz')->group(function() {
//     Route::get('/', 'QuizController@index');
// });

// Course Module
Route::get('/course/module/child/quiz', [QuizController::class, 'getCMQuiz'])->name('getCMQuiz')->middleware('access:course_module_manage');
Route::get('/course/module/child/quiz/edit', [QuizController::class, 'getEditCMQuiz'])->name('getEditCMQuiz')->middleware('access:course_module_manage');
Route::post('/course/module/child/quiz/edit', [QuizController::class, 'postEditCMQuiz'])->name('postEditCMQuiz')->middleware('access:course_module_manage');
Route::get('/course/module/child/quiz/add', [QuizController::class, 'getAddCMQuiz'])->name('getAddCMQuiz')->middleware('access:course_module_manage');
Route::post('/course/module/child/quiz/add', [QuizController::class, 'postAddCMQuiz'])->name('postAddCMQuiz')->middleware('access:course_module_manage');

Route::get('/course/class/module/child/quiz', [QuizController::class, 'getCCModQuiz'])->name('getCCModQuiz');

