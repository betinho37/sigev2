<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
	protected $fillable = ['name'];

	public static function listEmpresas()
	{
		return static::orderBy('name')->pluck('name', 'id');
	} 
}
