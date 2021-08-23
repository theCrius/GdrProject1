<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class SkillController extends Controller
{


    public function __construct(){
        return $this->middleware('auth');
    }


    
    public static function getSkills(User $user){
        
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

    public static function getSpecs(User $user) {
        $specOrdered = [
            'breed' => [],
            'classe' => [],
            'hemispere' => []
        ];

        $specs=$user->specs;
        foreach($specs as $spec){
            $skillBelongsTo=\App\Skill::where('id',$spec->id_skill1)->get()[0];
            
            if($skillBelongsTo->id_breed){
                $specOrdered['breed'][]=$spec->url_image;
                continue;
            }elseif($skillBelongsTo->id_classe){
                 $specOrdered['classe'][]= $spec->url_image;
                 continue;
            }
            $specOrdered['hemispere'][]=$spec->url_image;
            
        }

        return $specOrdered;
    } 
    
    
   public function show(Request $request,int $id){
       $user=\App\User::where('id',$id)->with('skills')->get()[0];

        
       
        
       $this->saveDataPreSubmit($request);
      
       return view('internoLand.schedaUser.showSkill',[
        'skills' =>  self::getSkills($user),
        'id_user' => $user->id,
        'userView' => \Auth::user(),
        'specs' => self::getSpecs($user)
       ]);
   } 

  

}