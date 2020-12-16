<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mechaobject extends Model
{
    protected $filliable= [
        'id_usermecha','id_sellingmechaobject'
    ];

    public function objectDescription(){
        return $this->belongsTo('\App\Sellingmechaobject','id_sellingmechaobject');
    }
    
    public function hurts(){
        return $this->hasMany('\App\Mechaobjecthurtsrecord','id_mechaobject');
    }
}
