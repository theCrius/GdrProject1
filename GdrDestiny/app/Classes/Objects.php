<?php
namespace App\Classes;
trait Objects{

    //return an instance of objects that are equipped(yes) or simply owned by user
    public function objectsEquipped($yesOrNow){
        
        $objectsOwned=$this->objects;
        $objectsEquipped=[];
        foreach($objectsOwned as $object){

            // enum di equipped yes or no
            if($object->equipped == $yesOrNow){

                //function getPoints() returns the lifepoints of object and we can find it in Classes\ObjectPoints.php
                
                $objectsEquipped[]=
                [
                    'object' => $object->object,
                    'id' => $object->id,
                    'usura' => [
                        'posseduta' => $object->getPoints(),
                        'massima' => $object->object->usura
                    ]
                    
                ];

            
            }

    }
        return $objectsEquipped;

    }

    

}

?>