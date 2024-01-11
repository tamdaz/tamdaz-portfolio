<?php

use App\Models\Category;
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
        if (!Schema::hasTable('categories') && Schema::hasTable('blogs')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique()->nullable(false);
                $table->timestamps();
            });

            Schema::table('blogs', function (Blueprint $table) {
                $table->foreignIdFor(Category::class)->nullable()->constrained()->restrictOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (App::isLocal()) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->dropForeignIdFor(Category::class);
            });

            Schema::dropIfExists('categories');
        }
    }
};
