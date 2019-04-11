<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
    'name',
    'cpf',
    'cnpj',
    'email',
    'celular',
    'telefone',
    'pessoa'
    ];

    public static function listClientes()
    {
        return static::orderBy('name')->pluck('name', 'id');
    }
} 


