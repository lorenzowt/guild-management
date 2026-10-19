<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hero_mission', function (Blueprint $table) {
            $table->dropForeign(['mission_id']);

            $table->foreign('mission_id')
                ->references('id')
                ->on('missions')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('hero_mission', function (Blueprint $table) {
            $table->dropForeign(['mission_id']);

            $table->foreign('mission_id')
                ->references('id')
                ->on('missions');
        });
    }
};