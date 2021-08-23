<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Sodium\memcmp;

class UsermechaController extends Controller
{
    public function show($idUser,Request $request){
        $user=\App\User::find($idUser);
        $mecha= $user->mecha;
        if( !$mecha ) { 
            return $this->returnBackWithError($request,'okkko'); 
        }
        
        return view('internoLand.schedaUser.showMecha',[
           'hurts' => $mecha->hurts,
           'points' => $mecha->getPointsMecha(),
           'partsOfMecha' => \Config::get('mecha.partsOfMecha'),
           'mechaName' => $mecha->name,
           'mechaImg' => $mecha->immagine,
           'partsHurted' => $mecha->getPartsHurted(),
           'statistics' => $mecha->getStatistics(),
           'objectsEquippedToMecha' => $mecha->getObjects()
        ]);
    }
}
