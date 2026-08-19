<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('landing_settings', function (Blueprint $table) {
            $table->string('about_point_1')->nullable();
            $table->string('about_point_2')->nullable();
            $table->string('about_point_3')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('landing_settings', function (Blueprint $table) {
            $table->dropColumn([
                'about_point_1',
                'about_point_2',
                'about_point_3',
            ]);
        });
    }
};