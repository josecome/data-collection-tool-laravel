<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_forms', function (Blueprint $table) {
            $table->id();
            $table->string('field_name', 80);
            $table->string('field_label', 80);
            $table->string('field_description', 160);
            $table->string('field_type', 80);
            $table->integer('field_size');
            $table->unsignedBigInteger('form_meta_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('form_meta_id')->references('id')->on('project_form_meta')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_forms');
    }
};
