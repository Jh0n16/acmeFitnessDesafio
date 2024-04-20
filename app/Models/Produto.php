<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;
    protected $table = "produtos";
    protected $primaryKey = "id";
    protected $nome;
    protected $cor;
    protected $imagem;
    protected $preco;
    protected $descricao;
    protected $dataDeCadastro;
    protected $peso;
    protected function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
