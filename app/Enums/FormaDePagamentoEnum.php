<?php

namespace App\Enums;

enum FormaDePagamentoEnum: string
{
    case PIX = 'pix';
    case BOLETO = 'boleto';
    case CARTAO = 'cartao';

    public static function getValues(): array
    {
        return [
            self::BOLETO->value,
            self::CARTAO->value,
            self::PIX->value
        ];
    }
    
}
