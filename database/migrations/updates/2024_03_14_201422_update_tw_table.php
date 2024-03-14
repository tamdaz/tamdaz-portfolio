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
        Schema::table('tw', function (Blueprint $table) {
			$table->dropTimestamps();
			// Nullable for the moment...
			$table->dateTime('published_at')->nullable();
			$table->string('source')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
		Schema::table('tw', function (Blueprint $table) {
			$table->timestamps();
			$table->dropColumn('published_at', 'source');
		});
    }
};
