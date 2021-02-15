<?php 


namespace App\Classes;

trait Handle{

    public static function getSum($idUser){

        $nameModel = self::tableName();
     
        $totalSum= 0 ;
        $given = $nameModel . 'Given';
        $gotted = $nameModel . 'Gotted';

        $records=\App\User::where('id',$idUser)->with($given,$gotted)->get()[0];
        
        foreach($records[$gotted] as $recordGotted){

            $totalSum +=$recordGotted['quantita'];

        }
        foreach($records[$given] as $recordGiven){

            $totalSum -=$recordGiven['quantita'];

        }
        
        return $totalSum;
    }

    public static function add($ToAdd,$UserFrom=null,$UserTo,$motivazione){

        try{
            self::insert([
                'quantita' => $ToAdd,
                'id_user_from' => $UserFrom,
                'id_user_to' => $UserTo,
                'motivazione' => $motivazione,
                'created_at' => now()
            ]);
                
        }catch(\Exception $e){
            return $e->getMessage();
        }   
    }

    public static function remove($ToAdd,$UserFrom=null,$UserTo,$motivazione){
        try{
            self::insert([
                'quantita' => -$ToAdd,
                'id_user_from' => $UserFrom,
                'id_user_to' => $UserTo,
                'motivazione' => $motivazione,
                'created_at' => now()
            ]);
                
        }catch(\Exception $e){
            return $e->getMessage();
        }   
    }
}


?>