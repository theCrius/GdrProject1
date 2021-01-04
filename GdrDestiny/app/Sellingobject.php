<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellingobject extends Model
{
    protected $fillable=[
        'id_category','name','descrizione','prize','usura'
    ];
}
