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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('legal_name')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('tax_id')->nullable();
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('website')->nullable();
            $table->string('industry')->nullable();
            $table->string('company_size')->nullable(); // Small, Medium, Large, Enterprise
            $table->string('founded_year')->nullable();
            $table->string('headquarters')->nullable();
            $table->json('contact_info')->nullable(); // Phone, address, etc.
            $table->json('social_media')->nullable(); // Company social media accounts
            $table->json('brand_values')->nullable(); // Company values and mission
            $table->json('target_audience')->nullable(); // Demographics they target
            $table->json('marketing_preferences')->nullable(); // Types of campaigns they prefer
            $table->decimal('budget_range_min', 10, 2)->nullable();
            $table->decimal('budget_range_max', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
