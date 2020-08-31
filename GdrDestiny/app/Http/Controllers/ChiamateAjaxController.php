<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChiamateAjaxController extends Controller{
    public function __construct(){

        return $this->middleware('auth');

    }
    public function showUser($userIdToView, Request $request){
       
        return view('internoLand.schedaUser', [
            'userToView' => User::where('id',$userIdToView)->with('breed','classes')->get()[0],
            'errors' => $request->error,
            'userView' => \Auth::user(),
        ]);
    }

    public function addClass(Request $request){
        $classesUser=\App\Userclasse::find(\Auth::id()) ?? [];
        if(count($classesUser) > 1) $request->error='Errore, non puoi scegliere la tua classe, perchè già lo hai fatto'; 
        return view('internoLand.addClass',[
        'errors' => $request->error,
        'classes' => \App\Classe::all(),
        'userClasses' => $classesUser
            ]);
            
    }

    public function storeClass(Request $request){
        $idUser=\Auth::id();
        if(!(int)$request->class){
            $request->errors='Classe non aggiunta al tuo profilo, riprova';

            return redirect()->route('addClass');
        }
        
        \App\Userclasse::insert([
            'id_classe' => $request->class,
            'id_user' => $idUser
        ]);
        return redirect()->route('userProfile');
        
    }

}

?>