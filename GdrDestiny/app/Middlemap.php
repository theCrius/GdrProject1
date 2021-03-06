<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Middlemap extends Model
{
    protected $fillable = [

        'id_topmap', 'name'

    ];

    public function bottommaps(){

        return $this->hasMany('\App\Chat','id_middlemap','id');

    }
}
