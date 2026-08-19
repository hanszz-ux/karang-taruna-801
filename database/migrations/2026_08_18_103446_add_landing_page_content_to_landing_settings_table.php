<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_settings', function (Blueprint $table) {

            if (!Schema::hasColumn('landing_settings', 'hero_title')) {
                $table->string('hero_title')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'hero_description')) {
                $table->text('hero_description')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'hero_image')) {
                $table->string('hero_image')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'hero_button_text')) {
                $table->string('hero_button_text')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'hero_button_url')) {
                $table->string('hero_button_url')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'about_title')) {
                $table->string('about_title')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'about_description')) {
                $table->text('about_description')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'about_image')) {
                $table->string('about_image')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'vision')) {
                $table->text('vision')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'mission')) {
                $table->text('mission')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'stat_members')) {
                $table->unsignedInteger('stat_members')->default(0);
            }

            if (!Schema::hasColumn('landing_settings', 'stat_programs')) {
                $table->unsignedInteger('stat_programs')->default(0);
            }

            if (!Schema::hasColumn('landing_settings', 'stat_events')) {
                $table->unsignedInteger('stat_events')->default(0);
            }

            if (!Schema::hasColumn('landing_settings', 'stat_years')) {
                $table->unsignedInteger('stat_years')->default(0);
            }

            if (!Schema::hasColumn('landing_settings', 'address')) {
                $table->text('address')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'phone')) {
                $table->string('phone')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'email')) {
                $table->string('email')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'instagram')) {
                $table->string('instagram')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'facebook')) {
                $table->string('facebook')->nullable();
            }

            if (!Schema::hasColumn('landing_settings', 'youtube')) {
                $table->string('youtube')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('landing_settings', function (Blueprint $table) {

            $columns = [
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
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('landing_settings', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};