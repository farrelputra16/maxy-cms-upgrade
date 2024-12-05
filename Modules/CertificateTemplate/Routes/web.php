<?php

Route::group(['prefix' => 'course/class', 'middleware' => ['access:template_certificate_manage']], function () {
    Route::resource('certificate-templates', "CertificateTemplateController");
});
