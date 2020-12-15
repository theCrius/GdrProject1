<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsermechaController extends Controller
{
    public function show($idUser,Request $request){
        
        $user=\App\User::find($idUser);
        $mecha= $user->mecha;

        return view('internoLand.schedaUser.showMecha',[
           'hurts' => $mecha->hurts,
           'points' => $mecha->getPoints(),
           'partsOfMecha' => \Config::get('mecha.partsOfMecha'),
           'mechaName' => $mecha->name,
           'mechaImg' => $mecha->immagine,
           'partsHurted' => $mecha->getPartsHurted(),
           'statistics' => $mecha->getStatistics(),
           'objectsEquippedToMecha' => $mecha->objects
        ]);
    }
}
