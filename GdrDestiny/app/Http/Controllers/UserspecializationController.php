<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserspecializationController extends Controller
{
    public function addSpecs(int $idUser,string $specFrom){
    
        //$userSkill=\App\Userskill::select('id')->where('id_skill')
        //$test=\App\Specialization::where('')
       return view('internoLand.schedaUser.addSpec',[
        'idUser' => $idUser,
        'specs' => $specFrom
        ]);
    }

    public function storeSpecs($idUser){

    }
}
