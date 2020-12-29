<?php

namespace App\Http\Controllers;

use App\User;
use Exception;

class ChiamateAjaxController extends Controller{
    

    public function showBackground($idUser ,Request $request){
        $user=User::where('id',$idUser)->with('breed','classes','hemispere')->get()[0];
        $this->saveDataPreSubmit($request);
        return view('internoLand.schedaUser.background', [
            'userToView' =>$user,
            'userView' => \Auth::user(),

        ]);
    }

    public function editBackground($idUser,Request $request){
        $userIdToView=User::where('id',$idUser)->with('breed','classes','hemispere')->get()[0];
        $userView=\Auth::user();
        
        if($userIdToView->id !== $userView->id || $userView->hasRole(\Config::get('roles.ROLE_GESTORE'),[4,5])) return $this->returnBackWithError($request,'non hai i permessi per visualizzare questa pagina');
        $this->saveDataPreSubmit($request);
        

       

        return view('internoLand.schedaUser.backgroundEdit',
    [   
        'userToView' => $userIdToView,
        'userView' => $userView,
       
        

    ]);
    }

    public function updateBackground($idUser,Request $request){
        $userToModify=\App\User::find($idUser);
        $userView=\Auth::user();
       
        //the html tags are eliminated excpet p, h1 ecc.. , br
        $background_with_spaces=nl2br($request->background);
        $new_background=strip_tags($background_with_spaces,'<p><h1><h2><h3><h4><h5><br>');

        
        $linkMusicToStore=htmlspecialchars(strip_tags($request->linkMusic));

        if($userToModify->id !== $userView->id || $userView->hasRole(\Config::get('roles.ROLE_GESTORE'),[4,5])) return $this->returnBackWithError($request,'non hai i permessi per visualizzare questa pagina');
        //if the link music is written then we will check
        if(!filter_var($linkMusicToStore, FILTER_VALIDATE_URL) && $linkMusicToStore)  return $this->returnBackWithError($request,'link non valido');
        try{
            $userToModify->background=$new_background;
            $userToModify->url_music=$linkMusicToStore;
            $userToModify->save();
        }catch(Exception $e){
            return $this->returnBackWithError($request,$e->getMessage());
        }   
  

        $whatshowsInModal1=[
            'routeName' => 'showBackground',
            'parametrs' => $idUser,
            'scriptName' => 'schedaPg/userProfile.js'
        ];
        
        return $this->returnBack($request,null,$whatshowsInModal1);
        
        
    }


}

?>