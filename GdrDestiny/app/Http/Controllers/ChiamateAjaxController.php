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
            'userToView' => User::where('id',$userIdToView)->with('breed')->get()[0],
            'classes' => \App\Userclasse::where('id_user',$userIdToView)->with('classes')->get(),
            'errors' => $request->error,
            'userView' => \Auth::user(),
        ]);
    }

    public function addClass(Request $request){
        return view('internoLand.addClass',[
        'errors' => $request->error,
        'classes' => \App\Classe::all(),
        'userClasses' => \App\Userclasse::find(\Auth::id()) ?? []
            ]);
            
    }

    public function storeClass(Request $request){
        dd(\App\Classe::find($request->class));
    }

}

?>