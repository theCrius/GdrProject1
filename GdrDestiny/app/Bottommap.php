<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bottommap extends Model
{
    protected $fillable = [

        'id_middlemap' , 'id_topmap','name'

    ];

    public function chats(){

        return $this->hasMany('\App\Chat','id_bottommap','id');

    }
}
