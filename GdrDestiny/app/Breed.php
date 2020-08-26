<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    protected $filliable=[
        'name',
        'forza',
        'destrezza',
        'resistenza',
        'prontezza',
        'percezione',
        'intelligenza',
        'forzaLimite',
        'destrezzaLimite',
        'resistenzaLimite',
        'prontezzaLimite',
        'percezioneLimite',
        'intelligenzaLimite',
        'punti_mente',
        'punti_corpo',
        'descrizione',
        'immagini'
    ];

  

}
