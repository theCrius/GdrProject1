<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userobject extends Model
{
    //user can own max 21 objects (to edit go to blade files and controller of objects)
    protected $filliable=[
        'id_user','id_sellingobject','equipped'
    ];
    public function object(){
        return $this->belongsTo("App\Sellingobject",'id_sellingobject');
    }
}
