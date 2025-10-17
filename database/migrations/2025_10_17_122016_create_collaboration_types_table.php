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
        Schema::create('collaboration_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., 'Sponsored Post', 'Product Review', 'Brand Ambassador'
            $table->string('slug')->unique(); // URL-friendly identifier
            $table->text('description')->nullable();
            $table->string('icon')->nullable(); // FontAwesome icon class
            $table->string('color', 7)->default('#3B82F6'); // Hex color code
            $table->json('requirements')->nullable(); // What's typically required for this type
            $table->json('deliverables')->nullable(); // What's typically delivered
            $table->json('pricing_models')->nullable(); // Common pricing models for this type
            $table->json('duration_options')->nullable(); // Typical duration options
            $table->json('platforms')->nullable(); // Supported social platforms
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
            
            $table->index(['is_active', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collaboration_types');
    }
};