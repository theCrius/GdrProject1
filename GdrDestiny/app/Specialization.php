<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $filliable=[
        'name','livello','id_skill1','id_skill2'
    ];
}