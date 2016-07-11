<?php

namespace SPAL;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
     protected $table = 'sistema';

         protected $fillable = [
    	'uso',
    	'activo',
    	'feactivo',
    ];
}
