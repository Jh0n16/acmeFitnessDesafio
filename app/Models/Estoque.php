<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Estoque extends Model
{
    use HasFactory;

    protected $table = 'estoques';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tamanho',
        'precoDeVenda',
        'quantidadeDoEstoque',
        'produto_id',
    ];

    protected function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    protected function vendas(): BelongsToMany
    {
        return $this->belongsToMany(Venda::class);
    }
}
