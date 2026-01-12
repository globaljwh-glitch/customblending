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
        Schema::create('consultation_requests', function (Blueprint $table) {
            $table->id();

            // Basic user info
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('business_email')->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone')->nullable();

            // Form specific fields
            $table->string('what_best_describe_you')->nullable();
            $table->string('industry')->nullable();
            $table->text('description')->nullable();

            // Context / tracking
            $table->string('type')->nullable();      // service / industry / page
            $table->string('page_name')->nullable(); // source page URL or slug

            // Extra dynamic fields
            $table->json('extra_data')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_requests');
    }
};
