<?php

namespace App\Http\Controllers;

use App\userclasses;
use Illuminate\Http\Request;

class UserclasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    
    public function addClass(Request $request){
        $classesUser=\App\Userclasse::where('id_user',\Auth::id())->get();


        if(count($classesUser) > 1) $request->error='Errore, non puoi scegliere la tua classe, perchè già lo hai fatto'; 
        return view('internoLand.schedaUser.addClass',[
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
        return redirect()->route('home');
        
    }
}
