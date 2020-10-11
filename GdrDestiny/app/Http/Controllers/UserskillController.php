<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserskillController extends Controller
{

    public function getSkills(User $user){
        
        $skillOrdered = [
            'breed' => [],
            'classe' => [],
            'hemispere' => []
        ];
        foreach($user->skills as $skill){
           if($skill->id_breed){
               $skillOrdered['breed'][]=[
                   "name" => $skill->name,
                   'level' => $skill->pivot->livello,
                   'id' => $skill->id,
               ];
               continue;
           }elseif($skill->id_classe){
                $skillOrdered['classe'][]=[
                    'name' => $skill->name,
                    'level' => $skill->pivot->livello,
                    'id' => $skill->id
                ];
                continue;
           }
           $skillOrdered['hemispere'][]=[
            'name' => $skill->name,
            'level' => $skill->pivot->livello,
            'id' => $skill->id
        ];
        }
        return $skillOrdered;
    }

    public function addSkills(int $idUser,string $skillFrom, Request $request){
        $skillBelongsTo='id_' . $skillFrom;
        $user=\App\User::where('id',$idUser)->with('skills','classes')->get()[0];
        $skillsOfUser=$this->getSkills($user);
        $idSkillsGotByUser= [];
        $viewToReturn='internoLand.schedaUser.addSkills';

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
    if(count($idSkillsGotByUser) === 3) $request->errors['message']='Hai già scelto le tue abilita, mi dispiace';
    
    //controllo permessi
    if((! \Auth::user()->hasRole(\Config::get('roles.ROLE_ADMIN'),[4,5])) && \Auth::user()->id !== $idUser) $request->errors['message']='Non hai le giuste autorizzazioni, riprova';
    
    //se ci sono errori blocca tutto
    if($request->errors) return $this->returnBackWithError($request,$request->errors['message']);
    
    return view('internoLand.schedaUser.addSkills',[
            'skills' => \App\Skill::select('id',$skillBelongsTo,'name','description')->whereIn($skillBelongsTo,$idBreedOrClassOrHemispere)->whereNotIn('id',$idSkillsGotByUser)->get(),
            'idUser' => $idUser,
            
            
        
        ]);
   }

   public function storeSkills($idUser, Request $request){

       $idSkills=$request->idSkills;

       
        if( !$idSkills ||count($idSkills) != 3) return $this->returnBackWithError($request, 'Devi scegliere 3 skill');
        
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

        return $this->returnBack($request);
   }

   public function updateSkill($idUser,$idSkill,Request $request){
        $updateLevel=\App\Userskill::where('id_user',$idUser)->where('id_skill',$idSkill)->get()[0];
        $updateLevel->livello+=1;
        $updateLevel->save();

        return $this->returnBack($request);
   }
}
