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
        if (! Schema::hasTable('reports')) {
            Schema::create('reports', function (Blueprint $table) {
                $table->id();
                $table->integer('report_id');
                $table->string('title');
                $table->date('file_created_at');
                $table->timestamps();

                // Directly create foreign id on 'reports' table because 'categories' table was already created
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
            Schema::table('reports', function (Blueprint $table) {
                $table->dropForeignIdFor(Category::class);
            });

            Schema::dropIfExists('reports');
        }
    }
};
