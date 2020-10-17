<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpController extends Controller
{
    public static function getSumOfExp($idUser){
        $exps=0;

        $expsOfUser=\App\User::where('id',$idUser)->with('exps')->get()[0];
       
        foreach($expsOfUser['exps'] as $expOfUser){
            $exps+=$expOfUser['exp_dati'];
        }
        
        return $exps;
    }
}
