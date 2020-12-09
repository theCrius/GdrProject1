<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classes\Objects;

class UserobjectController extends Controller 
{


    public function showObjectEquipped($idUser){
        $user=\App\User::find($idUser);

        return view('internoLand.schedaUser.showEquippedObject',[
            'userView' => \Auth::user(),
            'userToView' => $user,
            'objectsEquipped' => $user->objectsEquipped('yes')
        ]);
    }

    public function showObjectOwned($idUser){
        $user=\App\User::find($idUser);
        return view('internoLand.schedaUser.showOwnedObject',[
            'userView' => \Auth::user(),
            'userToView' => $user,
            'objectsOwned' => $user->objectsEquipped('no')
        ]);
    }
}
