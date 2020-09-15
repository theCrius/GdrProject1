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
      
       return view('internoLand.schedaUser.showSkill',[
        'errors' => $request->error,
        'skills' =>  $this->getSkills($user),
        'id_user' => $user->id,
       ]);
   } 

   public function addSkills(int $idUser,string $skillFrom, Request $request){
    $skillBelongsTo='id_' . $skillFrom;
    $user=\App\User::where('id',$idUser)->with('skills')->get()[0];
    $skillsOfUser=$this->getSkills($user);
    $idSkillsGotByUser= [];

    foreach($skillsOfUser[$skillFrom] as $skillOfUser){

            $idSkillsGotByUser[]=$skillOfUser['id'];
    
        }

    //limite massimo di skill ottenibili per razza, classe ed emisfero
    if(count($idSkillsGotByUser) === 3) $request->error='Hai già scelto le tue abilita, mi dispiace';
  
        return view('internoLand.schedaUser.addSkills',[
            'errors' => $request->error,
            'skills' => \App\Skill::select('id',$skillBelongsTo,'name')->where($skillBelongsTo,$user[$skillBelongsTo])->whereNotIn('id',$idSkillsGotByUser)->get()

            
        
        ]);
   }
}
