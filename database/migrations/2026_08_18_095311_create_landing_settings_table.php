<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_settings', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_url')->nullable();

            // About
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();

            // Visi & Misi
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();

            // Statistik
            $table->unsignedInteger('stat_members')->default(0);
            $table->unsignedInteger('stat_programs')->default(0);
            $table->unsignedInteger('stat_events')->default(0);
            $table->unsignedInteger('stat_years')->default(0);

            // Kontak
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            // Social Media
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_settings');
    }
};