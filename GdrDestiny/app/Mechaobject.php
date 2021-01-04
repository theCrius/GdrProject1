<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\BuyingObjects;

class Mechaobject extends Model
{

    protected $fillable= [
        'id_usermecha','id_sellingmechaobject'
    ];

    public function usermecha(){

        return $this->belongsTo('\App\Usermecha','id_usermecha');

    }
   

    public function object(){
        return $this->belongsTo('\App\Sellingmechaobject','id_sellingmechaobject');
    }
    
    public function hurts(){
        return $this->hasMany('\App\Mechaobjecthurtsrecord','id_mechaobject');
    }

    protected $dispatchesEvents = [

        'creating' => BuyingObjects::class
    
    ];
}
