<?php
namespace App\Classes;
trait Objects{

    //return an instance of objects that are equipped(yes) or simply owned by user
    public function objectsEquipped($yesOrNow){
        $objectsOwned=$this->objects;
        $objectsEquipped=[];
        foreach($objectsOwned as $object){

            // enum di equipped yes or no
            if($object->equipped == $yesOrNow) $objectsEquipped[]=$object->object;

    }
        return $objectsEquipped;

    }

    

}

?>