<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
	protected $primaryKey = 'idestado';

    protected $fillable = [
        'nombreestado',
    ];
}
