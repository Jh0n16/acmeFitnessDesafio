<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'dataDaVenda',
        'variacoesDosProdutos',
        'valorTotal',
        'valorDoFrete',
        'desconto',
        'formaDePagamento',
        'cliente_id',
        'endereco_id'
    ];

    protected function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    protected function endereco(): BelongsTo
    {
        return $this->belongsTo(Endereco::class);
    }

    protected function estoques(): BelongsToMany
    {
        return $this->belongsToMany(Estoque::class);
    }

}
