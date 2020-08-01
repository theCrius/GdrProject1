<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ChiamateAjaxController extends Controller{

    public function showUser($id){
  
        return view('internoLand.schedaUser', [
            'userInfo' => User::where('id',$id)
        ]);
    }

}

?>