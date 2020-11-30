<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserobjectController extends Controller
{
    public function showObjectEquipped($idUser){
        $user=\App\User::find($idUser);
        return view('internoLand.schedaUser.showEquippedObject',[
            'userView' => \Auth::user(),
            'userToView' => $user
        ]);
    }
    public function showObjectOwned($idUser){
        return view('internoLand.schedaUser.showOwnedObject',[
            
        ]);
    }
}
