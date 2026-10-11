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
        Schema::create('hero_mission', function (Blueprint $table) {
            $table->foreignId('hero_id')->constrained('heroes');
            $table->foreignId('mission_id')->constrained('missions');
            $table->primary(['hero_id', 'mission_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_mission');
    }
};
