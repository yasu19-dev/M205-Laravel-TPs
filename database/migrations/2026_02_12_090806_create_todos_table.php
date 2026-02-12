<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable(); // 'desc' dans le controlleur, 'description' ici. Attention à la cohérence.
            $table->boolean('is_completed')->default(false);
            $table->unsignedBigInteger('user_id')->nullable(); // Ajouté pour supporter l'exemple avec Auth
            $table->timestamps();
        });
        // [cite: 70, 71, 72, 73, 74, 75]
    }

    public function down()
    {
        Schema::dropIfExists('todos'); // [cite: 85]
    }
};
