<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecha extends Model
{
    protected $filliable= [
        'name' , 'costo' , 'salute'  ,'velocita' , 'potenza' , 'stazza', 'immagine'
    ];
}
