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
    
    
   public function show(Request $request,int $id){
       $user=\App\User::where('id',$id)->with('skills')->get()[0];
       

       //to add the script to deal the data to post
        $request->errors=[
            'scriptName' => '/schedaPg/addSkill.js'
        ];
       
        
       $this->saveDataPreSubmit($request,null,$user);
      
       return view('internoLand.schedaUser.showSkill',[
        'errors' => $request->errors,
        'skills' =>  self::getSkills($user),
        'id_user' => $user->id,
       ]);
   } 

  

}