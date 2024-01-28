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
        if (Schema::hasColumns('categories', ['created_at', 'updated_at'])) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }

        if (Schema::hasColumns('admin_ips', ['created_at', 'updated_at'])) {
            Schema::table('admin_ips', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }

        if (Schema::hasColumns('certifications', ['created_at', 'updated_at'])) {
            Schema::table('certifications', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }

        if (Schema::hasColumns('reports', ['created_at', 'updated_at'])) {
            Schema::table('reports', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }

        if (Schema::hasColumns('skills', ['created_at', 'updated_at'])) {
            Schema::table('skills', function (Blueprint $table) {
                $table->dropTimestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
