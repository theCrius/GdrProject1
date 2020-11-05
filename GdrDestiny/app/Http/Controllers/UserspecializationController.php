<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserspecializationController extends Controller
{
   
    public function addSpecs(int $idUser,string $specFrom,Request $request){

        $user=\App\User::where('id',$idUser)->with('skills')->get()[0];
        $userSkills=SkillController::getSkills($user)[$specFrom];

       
        
        //get the id of the skills
        foreach($userSkills as $skill){
            $idSkills[]=$skill['id'];
        }
        
        $specs=\App\Specialization::whereIn('id_skill1', $idSkills)->whereIn('id_skill2',$idSkills)->whereNotIn('id',\App\Userspecialization::select('id_specialization')->where('id_user',$idUser)->get()[0] ?? [])->get();
        
        
       return view('internoLand.schedaUser.addSpec',[
        'idUser' => $idUser,
        'specs' => $specs
        ]);
    }

    public function storeSpecs($idUser){

    }
}
