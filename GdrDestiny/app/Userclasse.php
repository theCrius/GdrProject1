<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userclasse extends Model
{
    protected $filliable=[
        'id_classe','id_user'
    ];
    public function classes(){
        return $this->belongsToMany('App\Classe','id_classe','id');
    }
    public function user(){
        return $this->HasMany('App\User','id_user','id');
    }
}
