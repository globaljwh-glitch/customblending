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
        Schema::create('analytical_lab_services', function (Blueprint $table) {
            $table->id();

            // User details
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Form-specific fields
            $table->string('interested_in')->nullable();
            $table->text('message')->nullable();

            // Context / tracking
            $table->string('type')->nullable();
            $table->string('page_name')->nullable();

            // Extra dynamic data
            $table->json('extra_data')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytical_lab_services');
    }
};
