<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mechaobjecthurtsrecord extends Model
{
    protected $filliable=[
        
        'id_mechaobject', 'hurt','id_user','descrizione'

    ];
    public function user(){

        return $this->belongsTo('\App\User','id_user');
    
    }
}
