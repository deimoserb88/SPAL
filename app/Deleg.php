<?php

namespace SPAL;

use Illuminate\Database\Eloquent\Model;

class Deleg extends Model
{
    protected $table = 'deleg';

    protected $fillable = [
    	'delegacion',
    ];

    public function des(){
    	return $this->hasMany('SPAL\des','id_deleg','id');
    }

}
