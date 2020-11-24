<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalrecordController extends Controller
{
    public static function getSumOfHurts($idUser){
        $hurtsum=0;

        $hurts=\App\User::find($idUser)->medicalrecords;
       
        foreach($hurts as $hurt){
            $hurtsum+=$hurt['danno'];
        }
        
        return $hurtsum;
    }
    public static function getMedicalRecords(\App\User $user){
    
        $medicalrecordsOrdered = [
            'top' => [],
            'bottom' => [],
            'middle' => []
        ];
        foreach($user->medicalrecords as $medicalrecord){
           if($medicalrecord->hurtposition === 'top'){
               
               $medicalrecordsOrdered['top'][]=[
                   'descrizione' => $medicalrecord->descrizione,
                   'danno' => $medicalrecord->danno,
               ];
               
               //get the last user that had add record.
               if(empty($medicalrecordsOrdered['top']['last_modifica']) || $medicalrecordsOrdered['top']['last_modifica'] < $medicalrecord->created_at) $medicalrecordsOrdered['top']['last_modifica']=$medicalrecord->userWhoAddHurt->name;

               continue;
           }elseif($medicalrecord->hurtposition === 'bottom'){
                $medicalrecordsOrdered['bottom'][]=[
                    'descrizione' => $medicalrecord->descrizione,
                    'danno' => $medicalrecord->danno,
                ];
                 //get the last user that had add record.
               if(empty($medicalrecordsOrdered['bottom']['last_modifica']) || $medicalrecordsOrdered['bottom']['last_modifica'] < $medicalrecord->created_at) $medicalrecordsOrdered['bottom']['last_modifica']=$medicalrecord->userWhoAddHurt->name;

                continue;
           }

           $medicalrecordsOrdered['middle'][]=[
            'descrizione' => $medicalrecord->descrizione,
            'danno' => $medicalrecord->danno,
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
