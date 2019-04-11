<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    protected $table = 'receita';

    protected $fillable = [
    'empresa_id',
    'cliente_id',
    'data',
    'previsao',
    'pagamento',
    'valor',
    'numerocontrato',
    'arquivo',
    'pdf'
    ];

    public function empresa()
    {
    	return $this->belongsTo('App\Empresa', 'empresa_id');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }
}
