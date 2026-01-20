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
         Schema::create('groupe_module', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groupe_id')->constrained('groupes');
            $table->foreignId('module_id')->constrained('modules');
            $table->integer('masse_horaire');
            $table->unique(['groupe_id', 'module_id']);
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::dropIfExists('groupe_module');
    }
};
