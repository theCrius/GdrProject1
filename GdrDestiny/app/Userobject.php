<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userobject extends Model
{
    protected $filliable=[
        'id_user','id_sellingobject','equipped'
    ]
}
