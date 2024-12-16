<?php

use Modules\CertificateTemplate\Http\Controllers\CertificateTemplateController;

Route::group(['prefix' => 'course/class', 'middleware' => ['access:template_certificate_manage']], function () {
    Route::resource('certificate-templates', "CertificateTemplateController");
});

Route::get('/certificate-templates/data', [CertificateTemplateController::class, 'getCertificateTemplateData'])->name('getCertificateTemplateData');
