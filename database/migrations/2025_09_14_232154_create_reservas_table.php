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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            // chaves estrangeiras 
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); 
            $table->foreignId('equipamento_id')->constrained('equipamentos')->onDelete('cascade'); 
            $table->dateTime('data_reserva'); 
            $table->dateTime('data_inicio');  
            $table->dateTime('data_fim');  
            $table->enum("status", ['Pendente', 'Aprovado', 'Reprovado', 'Em Andamento', 'Concluida']);
           
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
