<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historiques', function (Blueprint $table) {
            $table->id();
            // Lien vers le livre (si le livre est supprimé, on supprime l'historique en cascade)
            $table->foreignId('livre_id')->constrained('livres')->onDelete('cascade');

            // Lien optionnel vers l'utilisateur connecté (Breeze)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            $table->string('action'); // Exemple : "Le titre a été modifié"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historiques');
    }
};
