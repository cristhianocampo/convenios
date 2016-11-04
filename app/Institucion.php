<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
	protected $primaryKey = 'idinstitucion';

    protected $fillable = [
        'nombreinstitucion', 'tipo', 'existencia', 'plantafisica', 'nestudiantes', 'ndocentes',
	    'carreras',
    ];
}
