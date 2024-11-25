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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->unique(); // Identificador único de sesión
            $table->string('user_external_id')->nullable(); // ID del usuario del servicio principal
            $table->decimal('total', 15, 2)->default(0); // Ajustado para soportar precios en pesos colombianos
            $table->enum('status', ['active', 'abandoned', 'completed'])->default('active');
            $table->json('metadata')->nullable(); // Información adicional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
