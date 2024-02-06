<?php

Route::group(['prefix' => 'course/class', 'middleware' => ['auth']], function () {
    Route::resource('certificate-templates', "CertificateTemplateController");
});
