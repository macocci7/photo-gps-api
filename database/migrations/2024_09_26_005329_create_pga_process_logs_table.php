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
        Schema::create('pga_process_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pga_access_log_id')->constrained('pga_access_logs')->cascadeOnDelete();
            $table->string('filename');
            $table->string('exif_version')->nullable();
            $table->text('gps_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pga_process_logs');
    }
};
