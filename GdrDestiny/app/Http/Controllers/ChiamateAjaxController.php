<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChiamateAjaxController extends Controller{
    public function __construct(){

        return $this->middleware('auth');

    }
    public function showUser($idUser,$roleUser){
  
        return view('internoLand.schedaUser', [
            'userInfo' => User::where('id',$idUser),
            //'roleOfUser' => 
        ]);
    }

}

?>