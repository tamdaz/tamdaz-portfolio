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
        if (! Schema::hasTable('tw')) {
            Schema::create('tw', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('description');
                $table->text('image_url');
                $table->text('source_url');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (App::isLocal()) {
            Schema::dropIfExists('tw');
        }
    }
};
