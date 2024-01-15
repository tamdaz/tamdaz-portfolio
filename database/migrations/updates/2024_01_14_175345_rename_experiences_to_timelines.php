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
        if (Schema::hasTable('experiences')) {
            Schema::rename('experiences', 'timelines');
        }

        Schema::table('timelines', function (Blueprint $table) {
            $table->enum('type', ['experience', 'formation']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (App::isLocal()) {
            Schema::dropIfExists('timelines');
        }
    }
};
