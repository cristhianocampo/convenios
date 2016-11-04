<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
	protected $primaryKey = 'idenlace';

    protected $fillable = [
       'nombreenlace', 'institucion', 'telefono', 'email', 'tipo', 'unidad_id',
	   'cargo_id',
    ];

    public function scopeNombre($query, $nombre)
    {    	
    	//$query->where('nombreenlace', $nombre);
    	$query->where('nombreenlace', 'like', '%'.$nombre.'%')->get();
    }
}
