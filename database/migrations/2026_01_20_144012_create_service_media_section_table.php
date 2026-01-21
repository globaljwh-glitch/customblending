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
        Schema::create('service_media_section', function (Blueprint $table) {
            $table->id();

            // Relation with services table
            $table->foreignId('service_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // Media content
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            // Media handling
            $table->enum('media_type', ['image', 'video'])->nullable();
            $table->string('media_path')->nullable(); // image path or video URL
            $table->string('thumbnail')->nullable();  // optional thumbnail for video

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
        Schema::dropIfExists('service_media_section');
    }
};
