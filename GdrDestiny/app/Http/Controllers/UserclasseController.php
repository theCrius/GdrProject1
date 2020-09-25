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
        $user=\Auth::user();
        $classesUser=\App\Userclasse::where('id_user',$user->id)->get();
        
        if(count($classesUser) > 1) $this->returnBack($request,'hai già scelto le tue classi');
        $this->saveDataPreSubmit($request,$user);
        
        return view('internoLand.schedaUser.addClass',[
        'errors' => $request->error,
        'classes' => \App\Classe::all(),
        'userClasses' => $classesUser
            ]);
            
    }

    public function storeClass(Request $request){
        $idUser=\Auth::id();
        
        if(!(int)$request->class || !$request->class ) {
            return $this->returnBack($request,'errore ritenta');
        }
        
        \App\Userclasse::insert([
            'id_classe' => $request->class,
            'id_user' => $idUser
        ]);
        return redirect()->route('home');
        
    }
}
