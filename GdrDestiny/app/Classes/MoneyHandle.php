<?php
namespace App\Classes;
use \App\User;

trait MoneyHandle{

    public static function Calculate(User $user){

        $costo_totale=0;

        foreach( $user->money as $transaction){
            
            $costo_totale += $transaction->soldi;

        }

        return $costo_totale;
    }



}


?>