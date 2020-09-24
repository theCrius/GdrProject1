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
        $user=\App\User::where('id',$idUser)->with('skills','classes')->get()[0];
        $skillsOfUser=$this->getSkills($user);
        $idSkillsGotByUser= [];
        $viewToReturn='internoLand.schedaUser.addSkills';

    
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

    $request->session()->flash('last-position:RouteParams',$request->route()->parameters());
    $request->session()->flash('last-position:Chat',$user->last_chat);
    $request->session()->flash('last-position:View',$request->route()->getName());

    //limite massimo di skill ottenibili per razza, classe ed emisfero
    if(count($idSkillsGotByUser) === 3) $request->error='Hai già scelto le tue abilita, mi dispiace';
    
    if((! \Auth::user()->hasRole(\Config::get('roles.ROLE_ADMIN'),[4,5])) && \Auth::user()->id !== $idUser) $request->error='Non hai le giuste autorizzazioni, riprova';
     
    return view('internoLand.schedaUser.addSkills',[
            'errors' => $request->errors,
            'skills' => \App\Skill::select('id',$skillBelongsTo,'name')->whereIn($skillBelongsTo,$idBreedOrClassOrHemispere)->whereNotIn('id',$idSkillsGotByUser)->get(),
            'idUser' => $idUser,
            
            
        
        ]);
   }

   public function storeSkills($idUser, Request $request){
        return $this->returnBack($request);
   }
   public function returnBack(Request $request){
    
        if(!$request->session()->get('last-position:View')) abort('404');

        $datasToReSendBack=$request->session()->get('last-position:RouteParams');
        $request->errors=[
            'routeName' => route($request->session()->get('last-position:View'),$datasToReSendBack)
        ];
        
        
    
    return redirect()->route($request->session()->get('last-position:Chat'),["errors" => $request->errors]) ;
}
}
//http://127.0.0.1:8000/user/1/breed/AddSkills
