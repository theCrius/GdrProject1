<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecha extends Model
{
    protected $filliable= [
        'name' , 'costo' , 'salute' , 'velocità' , 'potenza' , 'stazza', 'immagine'
    ];
}
