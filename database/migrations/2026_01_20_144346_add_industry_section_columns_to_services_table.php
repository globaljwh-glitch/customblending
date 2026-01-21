<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('industry_section_title')
                  ->nullable()
                  ->after('status');

            $table->text('industry_section_description')
                  ->nullable()
                  ->after('industry_section_title');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'industry_section_title',
                'industry_section_description',
            ]);
        });
    }
};
