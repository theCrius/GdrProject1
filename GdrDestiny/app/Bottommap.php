<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bottommap extends Model
{
    protected $fillable = [

        'id_middlemap' , 'id_topmap','name','descrizione','meteo'

    ];

    protected $cast = [
        'meteo' => 'array'
    ];

    public function chats(){

        return $this->hasMany('\App\Chat','id_bottommap','id');

    }
}
