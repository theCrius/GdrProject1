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
        
        if(count($classesUser) > 1) $this->returnBackWithError($request,'hai già scelto le tue classi');
        $this->saveDataPreSubmit($request,null);
        
        return view('internoLand.schedaUser.addClass',[
        'errors' => $request->errors,
        'classes' => \App\Classe::all(),
        'userClasses' => $classesUser
            ]);
            
    }

    public function storeClass(Request $request){
        $idUser=\Auth::id();
        
        if(!(int)$request->class || !$request->class ) {
            return $this->returnBackWithError($request,'Classe non selezionata, riprova');
        }
        
        \App\Userclasse::insert([
            'id_classe' => $request->class,
            'id_user' => $idUser
        ]);
        $returnBackRoute['routeName']='userProfile';
        $returnBackRoute['parametrs']=$idUser;
        return $this->returnBack($request,'home',$returnBackRoute);
        
    }
}
