<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();  // Equivale ao seu id_equipamento INT AUTO_INCREMENT PRIMARY KEY
            $table->string('nome', 100);
            $table->string('modelo', 50)->nullable();
            $table->string('fabricante', 50)->nullable();
            $table->string('numero_serie', 50)->unique()->nullable();
            $table->date('data_aquisicao')->nullable();
            $table->enum('status', ['Ativo', 'Manutenção', 'Inativo', 'Disponível'])->default('Disponível');
            $table->decimal('valor_estimado', 10, 2)->nullable();
            $table->string('localizacao')->nullable();  // Já inserido aqui!
            $table->text('descricao')->nullable();
            $table->timestamps();  // Cria as colunas created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipamentos');
    }
};
