<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mecha extends Model
{
    protected $fillable= [
        'name' , 'prize' , 'salute'  ,'velocita' , 'potenza' , 'resistenza','descrizione'
    ];
}
