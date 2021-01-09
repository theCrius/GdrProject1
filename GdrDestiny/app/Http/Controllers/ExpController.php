<?php

namespace App\Http\Controllers;

use App\Classes\ExpHandle;
use App\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class ExpController extends Controller
{
    use ExpHandle;


    public function showLog($idUser){

        $user= User::findOrFail($idUser);

        return view('internoLand.schedaUser.log.exp',[

        ]);

    }

}
