<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bottommap extends Model
{
    protected $fillable = [

        'id_middlemap' , 'id_topmap','name'

    ];
}
