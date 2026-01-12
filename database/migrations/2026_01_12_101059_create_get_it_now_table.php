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
        Schema::create('get_it_now', function (Blueprint $table) {
            $table->id();

            // Basic user info
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('company_name')->nullable();

            // Form specific fields
            $table->string('what_best_describe_you')->nullable();

            // Multiple checkbox values (services interested in)
            $table->json('services_interested_in')->nullable();

            // Context / tracking
            $table->string('page_name')->nullable();   // e.g. services/custom-blending
            $table->string('type')->nullable();        // e.g. service / industry / landing

            // Any extra dynamic data
            $table->json('other_data')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('get_it_now');
    }
};
