<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nome', 100);
            $table->string('modelo', 50)->nullable();
            $table->string('fabricante', 50)->nullable();
            $table->string('numero_serie', 50)->unique()->nullable();
            $table->string('localizacao', 255)->nullable();
            $table->date('data_aquisicao')->nullable();
            $table->decimal('valor_estimado', 10, 2)->nullable();
            $table->enum('status', ['Ativo', 'Manutenção', 'Inativo', 'Disponível'])->default('Disponível');
            $table->text('descricao')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipamentos');
    }
};
