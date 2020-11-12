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
        $userExp=ExpController::getSumOfExp($idUser);


        //check if the user has the the exp necessary to buy the level
        if( $userExp < 100 ) $messageToShow='Hai bisogno di ' . (100 - $userExp) . ' exp';

        $user=\Auth::user();
        
        if( !$idSpecs ) $messageToShow='devi scegliere almeno 1 specializzazione';
        if($user->id != $idUser || $user->hasRole(\Config::get('roles.ROLE_ADMIN'),[4,5])) $messageToShow='Mi dispiace ma non hai le giuste autorizzazioni';

        if(isset($messageToShow)) return $this->returnBackWithError($request,$messageToShow);

        try{
            foreach($idSpecs as $idSpec){
                $idSpecDecrypt=\Crypt::decrypt($idSpec);
               
                if( !$this->checkIfSpecIsGetting($idSpecDecrypt,$idUser)) return $this->returnBackWithError($request,'la specializzazione non puo essere appresa');
                \App\Userspecialization::insert([
                    'id_specialization' => $idSpecDecrypt,
                    'id_user' => $idUser
                ]);

                ExpController::removeExp(100,1,$idUser,'Acquisto Spec ' . \App\Specialization::find($idSpecDecrypt)->name);
        

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


    public function checkIfSpecIsGetting($specId,$userId){
        $userSkills=\App\User::find($userId)->skills;
        $specSelected=\App\Specialization::where('id',$specId)->get()[0];

        $skillFound=0;

        foreach($userSkills as $skill){
   

            if($specSelected->id_skill1 === $skill->id || $specSelected->id_skill2 === $skill->id) $skillFound +=1;

        }
        if($skillFound == 2) return true;

        return false;


    }
}
