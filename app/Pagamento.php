<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{

	protected $table = 'pagamentos';

    protected $fillable = [
    'empresa_id',
    'destino_id',
    'name',
    'valor',
    'data',
    'situacao',
    'arquivo',
    'pdf'
    ];

    public function empresa()
    {
    	return $this->belongsTo('App\Empresa', 'empresa_id');
    }

    public function destino()
    {
        return $this->belongsTo('App\Destino', 'destino_id');
    }
    
    
}
