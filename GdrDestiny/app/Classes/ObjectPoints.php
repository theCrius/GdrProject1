<?php 

namespace App\Classes;

trait ObjectPoints{

    
    public function getPoints()
    {   
        $pointsFull=$this->object->usura;

        $hurtsrecords=$this->hurtsrecords;

        $hurtsum=0;

        foreach( $hurtsrecords as $hurt )
        {
            $hurtsum += $hurt->hurt;
        }

        return ( $pointsFull - $hurtsum );
    }


}


?>