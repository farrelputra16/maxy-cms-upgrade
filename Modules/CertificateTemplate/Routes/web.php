<?php

Route::group(['prefix' => 'course/class', 'middleware' => ['access:certificate_template_manage']], function () {
    Route::resource('certificate-templates', "CertificateTemplateController");
});
