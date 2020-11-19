<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChiamateAjaxController extends Controller{
    public function __construct(){

        return $this->middleware('auth');

    }
    
    public function showUser($userIdToView, Request $request){
       
       
        return view('internoLand.schedaUser.schedaUser', [
            'userToView' => User::where('id',$userIdToView)->with('breed','classes','hemispere')->get()[0],
            'expsUser' => ExpController::getSumOfExp($userIdToView),
            'errors' => $request->errors,
            'userView' => \Auth::user(),
        ]);
    }

    public function showBackground($idUser , Request $request){
        return view('internoLand.schedaUser.background', [
            'userToView' => User::where('id',$idUser)->with('breed','classes','hemispere')->get()[0],
            'errors' => $request->errors,
            'userView' => \Auth::user(),

        ]);
    }

    public function editBackground($idUser, Request $request){
        $userIdToView=User::where('id',$idUser)->with('breed','classes','hemispere')->get()[0];
        $userView=\Auth::user();
        //$userView->hasRole(Config::get('roles.ROLE_GESTORE'),[0,5]


        return view('internoLand.schedaUser.backgroundEdit',
    [   
        'userToView' => $userIdToView,
        'userView' => $userView
        

    ]);
    }

    public function updateBackground($idUser, Request $request){

    }


}

?>