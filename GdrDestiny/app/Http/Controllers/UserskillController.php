<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserskillController extends Controller
{


    public function addSkills(int $idUser,string $skillFrom, Request $request){
        $skillBelongsTo='id_' . $skillFrom;
        $user=\App\User::where('id',$idUser)->with('skills','classes')->get()[0];
        $skillsOfUser=SkillController::getSkills($user);
        $idSkillsGotByUser= [];

    
    $this->saveDataPreSubmit($request,'schedaPg/addSkill.js',$user);
    //get the id of skill are already gotten 
    foreach($skillsOfUser[$skillFrom] as $skillOfUser){

            $idSkillsGotByUser[]=$skillOfUser['id'];
    
        }
    //get the id to select skill 
    if($skillFrom === 'breed'){
        $idBreedOrClassOrHemispere = [$user['id_razza']];
         
        
    }elseif($skillFrom == 'hemispere'){
        $idBreedOrClassOrHemispere = [$user['id_emisfero']];
    
    }elseif($skillFrom == 'classe'){
        $idClasses=[];
        foreach($user->classes as $classe){
            $idClasses[]=$classe->id;
        }
        $idBreedOrClassOrHemispere=array_values($idClasses);
    }

   

    //limite massimo di skill ottenibili per razza, classe ed emisfero
    if(count($idSkillsGotByUser) === 3) $messageToShow='Hai già scelto le tue abilita, mi dispiace';
    
    //controllo permessi
    if((! \Auth::user()->hasRole(\Config::get('roles.ROLE_ADMIN'),[4,5])) && \Auth::user()->id !== $idUser) $messageToShow='Non hai le giuste autorizzazioni, riprova';
    
    //se ci sono errori blocca tutto
    if(isset($messageToShow)) return $this->returnBackWithError($request,$messageToShow);
    
    return view('internoLand.schedaUser.addSkills',[
            'skills' => \App\Skill::select('id',$skillBelongsTo,'name','description')->whereIn($skillBelongsTo,$idBreedOrClassOrHemispere)->whereNotIn('id',$idSkillsGotByUser)->get(),
            'idUser' => $idUser,
            
            
            
        
        ]);
   }

    public function checkIfSkillIsGetting($skillId,$userId){
        $Skill=\App\Skill::find($skillId);
        $user=\App\User::find($userId);

        foreach( $user->classes as $class ){
            $idClasses[]=$class->id;
        }

        
        if($Skill->id_breed == $user->id_razza  ||  $Skill->id_hemispere == $user->id_emisfero    || in_array($Skill->id_classe,$idClasses)) return true;

        //if the skill is not getting because the user doesn't own the the breed or the classes or the hemispere right
        return false;


    }

   public function storeSkills($idUser, Request $request){

       $idSkills=$request->idSkills;
        $user=\Auth::user();
       
        if( !$idSkills || count($idSkills) != 3) $messageToShow='devi scegliere 3 skill';
        
        if($user->id != $idUser || $user->hasRole(\Config::get('roles.ROLE_ADMIN'),[4,5])) $messageToShow='Mi dispiace ma non hai le giuste autorizzazioni';
        if(isset($messageToShow)) return $this->returnBackWithError($request,$messageToShow);
        try{
            foreach($idSkills as $idSkill){
                $idSkillDecrypt=\Crypt::decrypt($idSkill);
                
                if(!$this->checkIfSkillIsGetting($idSkillDecrypt,$idUser)) return $this->returnBackWithError($request,'non puoi ottenere la skill');

                \App\Userskill::insert([
                    'id_skill' => $idSkillDecrypt,
                    'id_user' => $idUser,
                    'livello' => 1,
                    'created_at' => now()
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
 

   public function incrementLevelOfSkill($idUser,$idSkill,Request $request){
        $updateLevel=\App\Userskill::where('id_user',$idUser)->where('id_skill',$idSkill)->with('skill')->get()[0];
        $user=\Auth::user();
        $userExp=ExpController::getSumOfExp($idUser);

        //the quantity of exp to buy a level, change the number after the ()
        $expToUseToBuyLevel=($updateLevel->livello + 1) * 20;
      
        
        //check if the user has the the exp necessary to buy the level
        if($expToUseToBuyLevel > $userExp) $messageToShow='Hai bisogno di ' . ($expToUseToBuyLevel - $userExp) . ' exp';

        if($user->id != $idUser || $user->hasRole(\Config::get('roles.ROLE_ADMIN'),[4,5])) $messageToShow='Mi dispiace ma non hai le giuste autorizzazioni';

      

        

        if(isset($messageToShow)) return $this->returnBackWithError($request,$messageToShow);

        //add the level of skill
        $updateLevel->livello+=1;

        //save the change
        $updateLevel->save();
        
        ExpController::removeExp($expToUseToBuyLevel,1,$idUser,'Upgrade livello ('. $updateLevel->livello . ') : '. $updateLevel->skill->name );
        
        $whatshowsInModal=[
            'routeName' => 'showSkills',
            'parametrs' => $idUser
        ];
        
        return $this->returnBack($request,null,$whatshowsInModal);
   }
}
