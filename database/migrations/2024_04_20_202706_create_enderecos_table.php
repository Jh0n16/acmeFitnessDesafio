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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro', 64);
            $table->string('cidade', 32);
            $table->string('bairro', 32);
            $table->integer('numero');
            $table->string('cep', 8);
            $table->string('complemento', 128);
            $table->foreignId('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('endereco');
    }
};
