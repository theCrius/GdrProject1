<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function getSkills($id){
        $skills=\App\User::where('id',$id)->with('skills')->get()[0]->skills;
        $skillOrdered = [
            'breed' => [],
            'classe' => [],
            'hemispere' => []
        ];
        foreach($skills as $skill){
           if($skill->id_breed){
               $skillOrdered['breed'][]=[
                   "name" => $skill->name,
                   'level' => $skill->pivot->livello,
               ];
               continue;
           }elseif($skill->id_classe){
                $skillOrdered['classe'][]=[
                    'name' => $skill->name,
                    'level' => $skill->pivot->livello,
                ];
                continue;
           }
           $skillOrdered['hemispere'][]=[
            'name' => $skill->name,
            'level' => $skill->pivot->livello,
        ];
        }
        return $skillOrdered;
    }
   public function show(Request $request, $id){
       
       return view('internoLand.schedaUser.showSkill',[
        'errors' => $request->error,
        'skills' =>  $this->getSkills($id),
        'id_user' => \Auth::id() 
       ]);
   } 

   public function addSkills($id, Request $request){
        return view('internoLand.schedaUser.addSkills',[
            'errors' => $request->error,
        
        ]);
   }
}
