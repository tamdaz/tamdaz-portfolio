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
        if (! Schema::hasTable('maintenances')) {
            Schema::create('maintenances', function (Blueprint $table) {
                $table->id();
                $table->text('message')->nullable();
                $table->dateTime('end_maintenance');
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
            Schema::dropIfExists('maintenances');
        }
    }
};
