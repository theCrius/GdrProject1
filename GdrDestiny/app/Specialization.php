<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable=[
        'name','livello','id_skill1','id_skill2','descrizione','url_image'
    ];

    
}
