<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hemispere extends Model
{
    protected $filliable=[
        'name','descrizione','immagini'
    ];
    function testAdd(){
        $ok=\App\Hemispere::insert([
            'name' => 'emisfero destro',
            'descrizione' =>'okfokdfkokdf',
            'immagini' => null,           
            ]);
            $ok=\App\Hemispere::insert([
                'name' => 'emisfero sinsitro',
                'descrizione' =>'okfokdfkokdf',
                'immagini' => null,           
                ]);
    }
}
