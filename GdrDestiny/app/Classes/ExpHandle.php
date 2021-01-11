<?php
namespace App\Classes;

trait ExpHandle{

        public static function getSumOfExp($idUser){
            $exps=0;

            $expsOfUser=\App\User::where('id',$idUser)->with('expsGotted','expsGiven')->get()[0];
            
            foreach($expsOfUser['expsGotted'] as $expOfUserGotted){

                $exps+=$expOfUserGotted['exp_dati'];

            }
            foreach($expsOfUser['expsGiven'] as $expOfUserGiven){

                $exps-=abs($expOfUserGiven['exp_dati']);

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














?>