<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function show($idUser){
        return view('internoLand.schedaUser.showMedicalRecord',[
            'user' => \App\User::find($idUser),
        ]);
    }
}
