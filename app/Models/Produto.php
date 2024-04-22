<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'categoria_id',
    ];

    protected function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    protected function estoque(): HasMany
    {
        return $this->hasMany(Estoque::class);
    }
}
