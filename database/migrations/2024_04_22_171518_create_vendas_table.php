<?php

use App\Enums\FormaDePagamentoEnum;
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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->date('dataDaVenda');
            $table->jsonb('variacoesDosProdutos');
            $table->float('valorTotal', 2);
            $table->float('valorDoFrete', 2);
            $table->float('desconto', 2);
            $table->enum('formaDePagamento', FormaDePagamentoEnum::getValues());
            $table->foreignId('cliente_id');
            $table->foreignId('endereco_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('CASCADE');
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendas');
    }
};
