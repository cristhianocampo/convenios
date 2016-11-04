<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    protected $primaryKey = 'idconvenio';

	protected $fillable = [
	    'nombreconve', 'tipoconve', 'objetivo', 'procedencia', 'fechafirma', 
	    'fi', 'ff',  'frenovacion', 'pais', 'descripcion', 'comentario', 'archivo', 
	    'enlace_id', 'enlaceext', 'institucion_id', 'estado_id', 'beneficioscp', 'beneficioslp',
     ];

     public static function extraer()
    {
    	return DB::table('convenios')
    		->join('enlaces', 'enlaces.id', '=', 'convenios.enlace_id')
    		->join('institucions', 'institucions.id', '=', 'convenios.institucion_id')
    		->join('estados', 'estados.id', '=', 'convenios.estado_id')
    		->join('adicionals', 'adicionals.id', '=', 'convenios.adicional_id')
    		->select('convenios.*', 'enlaces.nombreenlace', 'institucions.nombreinstitucion', 'estados.nombreestado', 'adicionals.*')
    		->get();
    }
}
