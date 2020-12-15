<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usermecha extends Model
{
    protected $filliable=[

        'id_user','id_mecha','name'
    
    ]; 
    public function objects(){
        return $this->hasMany('\App\Mechaobject','id_usermecha');
    }
    public function mechaDescription(){
        return $this->belongsTo('\App\Mecha','id_mecha');
    }
}
