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
        Schema::create('punicoes', function (Blueprint $table) {
            $table->id();

            // chaves estrangeiras 
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); 
            $table->foreignId('reserva_id')->constrained('reservas')->onDelete('cascade'); 
            $table->dateTime('data_punicao'); 
            $table->mediumText('Motivo'); 
            $table->enum('tipo_punicao', ['Atraso', 'Dano', 'Perda', 'Conduta Inadequada'])->default('Atraso');
            $table->enum('tipo_penalidade', ['Advertência', 'Suspensão', 'Banimento'])->default('Advertência');
            $table->enum('status', ['Ativa', 'Resolvida'])->default('Ativa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punicoes');
    }
};
