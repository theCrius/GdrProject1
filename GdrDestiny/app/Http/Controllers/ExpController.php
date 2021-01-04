<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

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

    public static function addExp($expToAdd,$idUserFrom=null,$idUserTo,$motivazione){
        try{
            \App\Exp::insert([
                'exp_dati' => $expToAdd,
                'id_user_from' => $idUserFrom,
                'id_user_to' => $idUserTo,
                'motivazione' => $motivazione,
                'created_at' => now()
            ]);
                
        }catch(\Exception $e){
            return $e->getMessage();
        }   
    }

    public static function removeExp($expToAdd,$idUserFrom=null,$idUserTo,$motivazione){
        try{
            \App\Exp::insert([
                'exp_dati' => -$expToAdd,
                'id_user_from' => $idUserFrom,
                'id_user_to' => $idUserTo,
                'motivazione' => $motivazione,
                'created_at' => now()
            ]);
                
        }catch(\Exception $e){
            return $e->getMessage();
        }   
    }
}
