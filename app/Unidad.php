<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
	protected $primaryKey = 'idunidad';

	 protected $fillable = [
        'nombreunidad',
    ];   
}
