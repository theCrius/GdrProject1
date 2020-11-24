<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalrecordController extends Controller
{
    public static function getPoints($idUser){
        $hurtsum=0;
        $sanitamentaleSum=0;
        
        $user=\App\User::find($idUser)->with('medicalrecords','breed')->get()[0];
       
        foreach($user->medicalrecords as $hurt){
            if($hurt['hurtposition'] == 'sanitamentale') { $sanitamentaleSum+=$hurt['danno']; continue; }
            $hurtsum+=$hurt['danno'];
        }
        
        return [
            'punticorpo' => $user->breed->punti_corpo + $hurtsum,
            'puntimentali' => $user->breed->punti_mente + $sanitamentaleSum
        ];
    }

    

    public static function getMedicalRecords(\App\User $user){
    
        $medicalrecordsOrdered = [
            'top' => [],
            'bottom' => [],
            'middle' => []
        ];
        foreach($user->medicalrecords as $medicalrecord){
           if($medicalrecord->hurtposition === 'top' || $medicalrecord->hurtposition === 'sanitamentale'){
            //the unity of measure    
            $psOrsm= ($medicalrecord->hurtposition === 'top') ? 'pc' : 'pm';

               $medicalrecordsOrdered['top'][]=[
                   'descrizione' => $medicalrecord->descrizione,
                   'danno' => $medicalrecord->danno . $psOrsm,
               ];
               
               //get the last user that had add record.
               if(empty($medicalrecordsOrdered['top']['last_modifica']) || $medicalrecordsOrdered['top']['last_modifica'] < $medicalrecord->created_at) $medicalrecordsOrdered['top']['last_modifica']=$medicalrecord->userWhoAddHurt->name;

               continue;
           }elseif($medicalrecord->hurtposition === 'bottom'){
                $medicalrecordsOrdered['bottom'][]=[
                    'descrizione' => $medicalrecord->descrizione,
                    'danno' => $medicalrecord->danno . 'pc',
                ];
                 //get the last user that had add record.
               if(empty($medicalrecordsOrdered['bottom']['last_modifica']) || $medicalrecordsOrdered['bottom']['last_modifica'] < $medicalrecord->created_at) $medicalrecordsOrdered['bottom']['last_modifica']=$medicalrecord->userWhoAddHurt->name;

                continue;
           }

           $medicalrecordsOrdered['middle'][]=[
            'descrizione' => $medicalrecord->descrizione,
            'danno' => $medicalrecord->danno . 'pc',
        ];
         //get the last user that had add record.
         if(empty($medicalrecordsOrdered['middle']['last_modifica']) || $medicalrecordsOrdered['middle']['last_modifica'] < $medicalrecord->created_at) $medicalrecordsOrdered['middle']['last_modifica']=$medicalrecord->userWhoAddHurt->name;

        }
        return $medicalrecordsOrdered;
    }
    public function show($idUser){
        $user=\App\User::find($idUser);
        
        return view('internoLand.schedaUser.showMedicalRecord',[
            'user' => $user,
            'medicalrecords' => self::getMedicalRecords(($user)),
        ]);
    }
}
