<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'enderecos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'logradouro',
        'cidade',
        'bairro',
        'numero',
        'cep',
        'complemento',
        'cliente_id'
    ];
    
    protected function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    protected function venda(): HasMany
    {
        return $this->hasMany(Venda::class);
    }
}
