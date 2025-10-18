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
        Schema::table('influencer_profiles', function (Blueprint $table) {
            // Add missing boolean columns
            if (!Schema::hasColumn('influencer_profiles', 'has_manager')) {
                $table->boolean('has_manager')->default(false);
            }
            
            if (!Schema::hasColumn('influencer_profiles', 'has_agency')) {
                $table->boolean('has_agency')->default(false);
            }
            
            if (!Schema::hasColumn('influencer_profiles', 'is_featured')) {
                $table->boolean('is_featured')->default(false);
            }
            
            if (!Schema::hasColumn('influencer_profiles', 'is_premium')) {
                $table->boolean('is_premium')->default(false);
            }
            
            if (!Schema::hasColumn('influencer_profiles', 'accepts_direct_messages')) {
                $table->boolean('accepts_direct_messages')->default(true);
            }
            
            if (!Schema::hasColumn('influencer_profiles', 'show_contact_info')) {
                $table->boolean('show_contact_info')->default(true);
            }
            
            if (!Schema::hasColumn('influencer_profiles', 'show_rates')) {
                $table->boolean('show_rates')->default(false);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('influencer_profiles', function (Blueprint $table) {
            $columnsToDrop = [];
            
            if (Schema::hasColumn('influencer_profiles', 'has_manager')) {
                $columnsToDrop[] = 'has_manager';
            }
            
            if (Schema::hasColumn('influencer_profiles', 'has_agency')) {
                $columnsToDrop[] = 'has_agency';
            }
            
            if (Schema::hasColumn('influencer_profiles', 'is_featured')) {
                $columnsToDrop[] = 'is_featured';
            }
            
            if (Schema::hasColumn('influencer_profiles', 'is_premium')) {
                $columnsToDrop[] = 'is_premium';
            }
            
            if (Schema::hasColumn('influencer_profiles', 'accepts_direct_messages')) {
                $columnsToDrop[] = 'accepts_direct_messages';
            }
            
            if (Schema::hasColumn('influencer_profiles', 'show_contact_info')) {
                $columnsToDrop[] = 'show_contact_info';
            }
            
            if (Schema::hasColumn('influencer_profiles', 'show_rates')) {
                $columnsToDrop[] = 'show_rates';
            }
            
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};