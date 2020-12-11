<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes\ObjectPoints;

class Userobject extends Model
{
    use ObjectPoints; 

    //user can own max 21 objects (to edit go to blade files and controller of objects)
    protected $filliable=[
        'id_user','id_sellingobject','equipped'
    ];
    public function object(){
        return $this->belongsTo("App\Sellingobject",'id_sellingobject');
    }
    public function hurtsrecords(){
        return $this->hasMany('App\Objecthurtsrecord','id_object');
    }
}
