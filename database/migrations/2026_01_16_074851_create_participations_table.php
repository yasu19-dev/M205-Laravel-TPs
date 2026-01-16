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
        Schema::create('participations', function (Blueprint $table) {
            $table->foreignId('films_id')->constrained('films')->onDelete('cascade');
            $table->foreignId('acteur_id')->constrained('acteurs')->onDelete('cascade');
            $table->string('role');

            $table->primary(['films_id', 'acteur_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
