<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserobjectController extends Controller
{
    public function showObjectEquipped($idUser){
        return view('internoLand.schedaUser.showEquippedObject',[

        ]);
    }
}
