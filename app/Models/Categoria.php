<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nome',
        'descricao',
    ];

    protected function produto(): HasMany
    {
        return $this->hasMany(Produto::class);
    }
}
