<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Classes\Mecha;
use App\Events\BuyingObjects;

class Usermecha extends Model
{
    use Mecha;

    protected $fillable=[

        'id_user','id_mecha','name','immagine'
    
    ];

    public function objects(){
        return $this->hasMany('\App\Mechaobject','id_usermecha');
    }

    public function mechaDescription(){
        return $this->belongsTo('\App\Mecha','id_mecha');
    }

    public function hurts(){
        return $this->hasMany('\App\Mechahurtsrecord','id_usermecha');
    }
    protected $dispatchesEvents = [

        'creating' => BuyingObjects::class
    
    ];
}
