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
        if (! Schema::hasTable('timelines')) {
            Schema::create('timelines', function (Blueprint $table) {
                $table->id();
                $table->date('date_start');
                $table->date('date_end');
                $table->string('description');
                $table->enum('type', ['experience', 'formation']);
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
            Schema::dropIfExists('timelines');
        }
    }
};
