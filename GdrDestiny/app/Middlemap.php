<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Middlemap extends Model
{
    protected $fillable = [

        'id_topmap', 'name','descrizione','meteo'

    ];

    public function bottommaps(){

        return $this->hasMany('\App\Bottommap','id_middlemap','id');

    }

    public function chats(){

        return $this->hasMany('\App\Chat','id_middlemap','id');

    }
}
