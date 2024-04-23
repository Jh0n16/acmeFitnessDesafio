<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueVenda extends Model
{
    use HasFactory;
    protected $table = 'estoque_venda';
    protected $primaryKey = 'id';
    protected $fillable = [
        'venda_id',
        'estoque_id',
    ];
}
