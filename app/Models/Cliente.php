<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = ['nomeCompleto', 'cpf', 'dataDeNascimento'];

    protected function endereco(): HasMany
    {
        return $this->hasMany(Endereco::class); 
    }

}
