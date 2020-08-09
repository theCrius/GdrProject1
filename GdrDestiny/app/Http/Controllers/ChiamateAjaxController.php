<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChiamateAjaxController extends Controller{
    public function __construct(){

        return $this->middleware('auth');

    }
    public function showUser($userIdToView,$userIdThatView, Request $request){
  
        return view('internoLand.schedaUser', [
            'userToView' => User::where('id',$userIdToView)->get()[0],
            'errors' => $request->error,
            'userView' => User::where('id',$userIdThatView)->get()[0]
        ]);
    }

}

?>