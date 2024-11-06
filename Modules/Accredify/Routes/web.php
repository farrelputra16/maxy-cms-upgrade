<?php

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
use Illuminate\Support\Facades\Route;
use Modules\Accredify\Http\Controllers\AccredifyController;
use Modules\Accredify\Http\Controllers\CourseController;
use Modules\Accredify\Http\Controllers\TemplateController;

Route::prefix('accredify')->name('accredify.')->group(function () {
    Route::prefix('course')->name('course.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
    });

    Route::prefix('template')->name('template.')->group(function () {
        Route::get('/', [TemplateController::class, 'index'])->name('index');
    });


});

    // // Menampilkan daftar kursus
    // Route::get('/courses', [CreateCoursesAccredifyController::class, 'index'])->name('courses.index');
    //     // Menampilkan detail kursus berdasarkan ID
    //     Route::get('/courses/{id}', [CreateCoursesAccredifyController::class, 'show'])->name('courses.show');

    //     // Rute untuk membuat kursus baru
    //     Route::get('/courses/create', [CreateCoursesAccredifyController::class, 'create'])->name('courses.create');

    //     // Rute untuk menyimpan kursus baru
    //     Route::post('/courses', [CreateCoursesAccredifyController::class, 'store'])->name('courses.store');

    //     // Rute untuk memperbarui kursus
    //     Route::patch('/courses/{id}', [CreateCoursesAccredifyController::class, 'update'])->name('courses.update');

    //     // Rute untuk menghapus kursus (jika ada fitur delete)
    //     Route::delete('/courses/{id}', [CreateCoursesAccredifyController::class, 'destroy'])->name('courses.destroy');
    // });

    // // Email Template Accredify
    // Route::get('/email-templates', [EmailTemplateAccredifyController::class, 'index'])->name('emailTemplatesIndex');

    // // Route untuk menampilkan detail email template berdasarkan ID
    // Route::get('/email-templates/{id}', [EmailTemplateAccredifyController::class, 'show'])
    // ->name('emailTemplatesShow');

    // // Route untuk menampilkan form pembuatan email template
    // Route::get('/email_templates/create', [CreateEmailTemplateController::class, 'create'])
    // ->name('email_templates.create');

    // // Route untuk menyimpan email template yang baru dibuat
    // Route::post('/email_templates', [CreateEmailTemplateController::class, 'store'])
    // ->name('email_templates.store');

    // // Route untuk melakukan preview sebelum menyimpan email template
    // Route::post('/email_templates/preview', [CreateEmailTemplateController::class, 'preview'])
    // ->name('email_templates.preview');

    // // View and upload Badges Accredify
    // Route::get('/badges/view', [BadgesAccredifyController::class, 'index'])->name('badges.index');
    // // Fetch and view badges from Accredify API
    // Route::get('/badges-accredify/fetch', [BadgesAccredifyController::class, 'fetchBadgesFromAPI'])->name('badges.accredify.fetch');

    // Route::get('/badges/create', [BadgesAccredifyController::class, 'create'])->name('badges.create');
    // Route::post('/badges', [BadgesAccredifyController::class, 'store'])->name('badges.store');

    // Route::get('/badges/create', [CreateBadgesAccredifyController::class, 'create'])->name('badges.create');
    // // Route::post('/badges/storeaccredify', [CreateBadgesAccredifyController::class, 'store'])->name('badges.store');
