<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserspecializationController extends Controller
{
    public function returnSpecsOfUser($idUser){
        $specs_of_user=\App\Userspecialization::select('id_specialization')->where('id_user',$idUser)->get();
        foreach($specs_of_user as $spec_of_user){
            
            $idSpecsUser[]=$spec_of_user->id_specialization;
        }

        return $idSpecsUser ?? [];
    }
   
    public function addSpecs(int $idUser,string $specFrom,Request $request){

        $user=\App\User::where('id',$idUser)->with('skills')->get()[0];
        $userSkills=SkillController::getSkills($user)[$specFrom];

       $this->saveDataPreSubmit($request,'schedaPg/addSpec.js',$user);
        
        //get the id of the skills
        foreach($userSkills as $skill){
            $idSkills[]=$skill['id'];
        }
        
        $specs=\App\Specialization::whereIn('id_skill1', $idSkills)->whereIn('id_skill2',$idSkills)->whereNotIn('id',$this->returnSpecsOfUser($idUser))->get();
        
        
       return view('internoLand.schedaUser.addSpec',[
        'idUser' => $idUser,
        'specs' => $specs
        ]);
    }

    public function storeSpecs($idUser,Request $request){
        $idSpecs=$request->idSpecs;
        
        $user=\Auth::user();
        
        if( !$idSpecs ) $messageToShow='devi scegliere almeno 1 specializzazione';
        if($user->id != $idUser || $user->hasRole(\Config::get('roles.ROLE_ADMIN'),[4,5])) $messageToShow='Mi dispiace ma non hai le giuste autorizzazioni';

        if(isset($messageToShow)) return $this->returnBackWithError($request,$messageToShow);

        try{
            foreach($idSpecs as $idSpec){
                
                \App\Userspecialization::insert([
                    'id_specialization' => \Crypt::decrypt($idSpec),
                    'id_user' => $idUser
                ]);
            }

        }catch(\Exception $e){
            return $this->returnBackWithError($request,$e->getMessage());
        }
       
        $whatshowsInModal1=[
            'routeName' => 'showSkills',
            'parametrs' => $idUser
        ];
        return $this->returnBack($request,null,$whatshowsInModal1);

    }
}
