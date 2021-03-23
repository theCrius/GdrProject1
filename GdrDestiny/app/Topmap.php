<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topmap extends Model
{
    protected $fillable = [

        'name','meteo'

    ];

    public function chats(){

        return $this->hasMany('\App\Chat','id_topmap','id');

    }

    public function middlemaps(){

        return $this->hasMany('\App\Middlemap','id_topmap','id');

    }
}
