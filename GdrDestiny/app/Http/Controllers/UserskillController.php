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

   public function storeSkills($idUser, Request $request){

       $idSkills=$request->idSkills;

       
        if( !$idSkills || count($idSkills) != 3) return $this->returnBackWithError($request, 'Devi scegliere 3 skill');
        
        try{
            foreach($idSkills as $idSkill){
                \App\Userskill::insert([
                    'id_skill' => \Crypt::decrypt($idSkill),
                    'id_user' => $idUser,
                    'livello' => 1
                ]);
            }

        }catch(\Exception $e){
            
            return $this->returnBackWithError($request,$e);
        }
        $whatshowsInModal=[
            'nameRoute' => 'userProfile',
            'parametrs' => $idUser
        ];
        $whatshowsInModal=[
            'routeName' => 'showSkills',
            'parametrs' => $idUser
        ];
        return $this->returnBack($request,null,$whatshowsInModal);
   }

   public function updateSkill($idUser,$idSkill,Request $request){
        $updateLevel=\App\Userskill::where('id_user',$idUser)->where('id_skill',$idSkill)->get()[0];

        //the quantity of exp to buy a level, change the number after the ()
        $expToUseToBuyLevel=($updateLevel->level + 1) * 20;
        if($expToUseToBuyLevel > ExpController::getSumOfExp($updateLevel->id)) return $this->returnBackWithError($request,'Non hai exp sufficienti');
        $updateLevel->livello+=1;
        $updateLevel->save();
        $whatshowsInModal=[
            'routeName' => 'showSkills',
            'parametrs' => $updateLevel->id
        ];
        return $this->returnBack($request,null,$whatshowsInModal);
   }
}
