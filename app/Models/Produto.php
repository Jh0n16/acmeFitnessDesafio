<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'cor',
        'imagem',
        'preco',
        'descricao',
        'peso',
    ];

    protected function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
