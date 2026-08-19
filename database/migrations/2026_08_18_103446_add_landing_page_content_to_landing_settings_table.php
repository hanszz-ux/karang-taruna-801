<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_settings', function (Blueprint $table) {
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('hero_button_text')->nullable();
            $table->string('hero_button_url')->nullable();

            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();

            $table->text('vision')->nullable();
            $table->text('mission')->nullable();

            $table->unsignedInteger('stat_members')->default(0);
            $table->unsignedInteger('stat_programs')->default(0);
            $table->unsignedInteger('stat_events')->default(0);
            $table->unsignedInteger('stat_years')->default(0);

            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('landing_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title',
                'hero_description',
                'hero_image',
                'hero_button_text',
                'hero_button_url',

                'about_title',
                'about_description',
                'about_image',

                'vision',
                'mission',

                'stat_members',
                'stat_programs',
                'stat_events',
                'stat_years',

                'address',
                'phone',
                'email',

                'instagram',
                'facebook',
                'youtube',
            ]);
        });
    }
};