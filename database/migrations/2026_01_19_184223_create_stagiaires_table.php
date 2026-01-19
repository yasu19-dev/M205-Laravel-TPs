<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
        {
            Schema::create('stagiaires', function (Blueprint $table) {
                $table->id(); // Créé automatiquement [cite: 106]
                $table->string('nom');
                $table->string('prenom');
                $table->integer('age');
                $table->timestamps(); // Pour created_at et updated_at [cite: 113]
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
