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
        'punti_mente',
         'punti_corpo',
        'descrizione',
       'immagini'
    ];

    //riempire di dati il db
    function inserisciTestDiProva(){
        $ok=\App\Breed::insert([
        'name' => 'Test',
        'forza' => 10,
        'destrezza' => 102,
        'resistenza' => 9,
        'prontezza' => 9,
        'percezione' => 98,
        'intelligenza' => 88,
        'punti_mente' => 87,
         'punti_corpo'=> 9,
        'descrizione'=>'okokkok',
       'immagini'=>'ijjk',
        ]);

    }
}
