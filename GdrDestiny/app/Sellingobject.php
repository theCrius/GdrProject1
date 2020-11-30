<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellingobject extends Model
{
    protected $filliable=[
        'id_category','name','descrizione','prize'
    ];
}
