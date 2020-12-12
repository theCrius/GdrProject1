<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MechaController extends Controller
{
    public function show($idUser){
        return view('internoLand.schedaUser.showMecha',[
            
        ]);
    }
}
