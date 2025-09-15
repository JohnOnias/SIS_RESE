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
        Schema::create('retirada_devolucao', function (Blueprint $table) {
            $table->id();
            // chaves estrangeiras 
            $table->foreignId('reserva_id')->constrained('reservas')->onDelete('cascade');
            $table->dateTime('data_retirada'); 
            $table->dateTime('data_devolucao');  
            $table->mediumText('observacao'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retirada_devolucao');
    }
};
