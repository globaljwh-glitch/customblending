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
        Schema::create('service_accordions', function (Blueprint $table) {
            $table->id();

            // Relation with services table
            $table->foreignId('service_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Accordion content
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            // Controls
            $table->integer('display_order')->default(0);
            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_accordions');
    }
};
