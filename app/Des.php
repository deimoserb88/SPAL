<?php

namespace SPAL;

use Illuminate\Database\Eloquent\Model;

class Des extends Model
{
     protected $table = 'des';

     protected $fillable = [
     	'id_deleg',
     	'plant',
     	'nomplant',
     	'siglas',
     ];

     public function deleg(){
     	return $this->belongsTo('SPAL\Deleg','id_deleg');
     }

     public function programa(){
          return $this->hasMany('SPAL\Programa','plant','plant');
     }

     public function encuesta(){
          return $this->hasMany('SPAL\Encuesta','plant','plant');
     }    

}
