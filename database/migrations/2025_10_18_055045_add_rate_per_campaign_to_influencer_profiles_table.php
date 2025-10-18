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
            // Add rate_per_campaign column if it doesn't exist
            if (!Schema::hasColumn('influencer_profiles', 'rate_per_campaign')) {
                $table->decimal('rate_per_campaign', 10, 2)->nullable()->after('rate_per_video');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('influencer_profiles', function (Blueprint $table) {
            if (Schema::hasColumn('influencer_profiles', 'rate_per_campaign')) {
                $table->dropColumn('rate_per_campaign');
            }
        });
    }
};