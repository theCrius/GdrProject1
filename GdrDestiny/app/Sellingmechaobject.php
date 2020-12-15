<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sellingmechaobject extends Model
{
    
    protected $filliable= [
        'name','descrizione','prize','usura','velocita','resistenza','potenza','partmecha'
    ];
   
}
