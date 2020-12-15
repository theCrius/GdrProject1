<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mechahurtsrecord extends Model
{
    protected $filliable = [
        'descrizione' , 'id_user' , 'id_usermecha', 'partOfMecha','hurt'
    ];

    public function user(){

        return $this->belongsTo('\App\User','id_user');
    
    }
    
}
