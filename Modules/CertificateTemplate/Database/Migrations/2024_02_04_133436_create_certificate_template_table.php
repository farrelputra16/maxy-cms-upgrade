<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificateTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_template', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->unsignedInteger('batch');
            $table->string('description')->nullable();
            $table->string('template_content')->nullable();
            $table->json('marker_state')->nullable();
            $table->integer("m_course_type_id");
            $table->foreign('m_course_type_id')->references("id")->on("m_course_type");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_template');
    }
}
