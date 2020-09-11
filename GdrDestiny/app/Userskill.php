<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userskill extends Model
{
    protected $fillable=[
        'id_user','id_skill','livello'
    ];
}
