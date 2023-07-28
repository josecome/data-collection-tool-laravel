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
        Schema::create('project_form_meta', function (Blueprint $table) {
            $table->id();
            $table->string('form_name', 80);
            $table->string('form_description', 140);
            $table->string('form_country', 60);
            $table->string('form_field', 80);
            $table->string('form_status', 10);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_form_meta');
    }
};
