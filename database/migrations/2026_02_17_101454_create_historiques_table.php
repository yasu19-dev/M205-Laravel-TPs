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
        Schema::create('historiques', function (Blueprint $table) {
            $table->id();
            $table->string('nom_table'); // Le nom de la table concernée
            $table->unsignedBigInteger('user_id')->nullable(); // L'utilisateur qui a fait l'action
            $table->string('operation'); // "Ajout", "Modification", "Suppression", "Restauration"
            $table->dateTime('date'); // La date de l'action
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiques');
    }
};
