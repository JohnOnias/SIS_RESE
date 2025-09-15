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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("nome_usuario"); 
            $table->string('email_usuario')->unique();
            $table->string('matricula_usuario')->unique(); 
            $table->string('telefone_usuario'); 
            $table->enum('tipo_usuario', ['Aluno', 'Funcionario'])->default('Aluno');
            $table->string('senha_usuario');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
