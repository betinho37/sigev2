<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
	protected $fillable = ['name'];

	public static function listDestinos()
	{
		return static::orderBy('name')->pluck('name', 'id');
	} 
}
