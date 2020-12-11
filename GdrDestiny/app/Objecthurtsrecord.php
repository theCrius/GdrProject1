<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objecthurtsrecord extends Model
{
    protected $filliable=[
        'id_object','hurt','id_user','descrizione'
    ];
    public function user(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
