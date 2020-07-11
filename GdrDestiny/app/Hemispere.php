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
            'immagini' => 'ok',           
            ]);
            $ok=\App\Hemispere::insert([
                'name' => 'emisfero sinistro',
                'descrizione' =>'okfokdfkokdf',
                'immagini' => 'ok',           
                ]);
    }
}
