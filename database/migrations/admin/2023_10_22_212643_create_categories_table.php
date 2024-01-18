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
        if (! Schema::hasTable('categories') && Schema::hasTable('blogs')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique()->nullable(false);
                $table->timestamps();
            });

            if (! Schema::hasColumn('categories', 'used_for')) {
                Schema::table('categories', function (Blueprint $table) {
                    $table->enum('used_for', ['blogs', 'reports']);
                });
            }

            // Alter 'blogs' table because it was created before 'categories' table exists.
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
