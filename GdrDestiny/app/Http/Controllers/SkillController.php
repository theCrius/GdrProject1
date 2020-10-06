<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class SkillController extends Controller
{


    public function __construct(){
        return $this->middleware('auth');
    }



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
    
    
   public function show(Request $request,int $id){
       $user=\App\User::where('id',$id)->with('skills')->get()[0];
       //to add the script to deal the data to post
        $request->errors=[
            'scriptName' => '/schedaPg/addSkill.js'
        ];
       return view('internoLand.schedaUser.showSkill',[
        'errors' => $request->errors,
        'skills' =>  $this->getSkills($user),
        'id_user' => $user->id,
       ]);
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
    
   
    return view('internoLand.schedaUser.addSkills',[
            'errors' => $request->errors,
            'skills' => \App\Skill::select('id',$skillBelongsTo,'name','description')->whereIn($skillBelongsTo,$idBreedOrClassOrHemispere)->whereNotIn('id',$idSkillsGotByUser)->get(),
            'idUser' => $idUser,
            
            
        
        ]);
   }

   public function storeSkills($idUser, Request $request){
       $redirectRoute['nameRoute']='showSkills';
       $redirectRoute['parametrs']=\Auth::id();
        
        return $this->returnBackWithError($request,'jijcij');
   }

}