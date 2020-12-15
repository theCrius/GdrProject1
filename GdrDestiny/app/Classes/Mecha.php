<?php

namespace App\Classes;

use App\Usermecha;
use Error;

trait Mecha{
    


    public function getPartsOfMecha(){

        return \Config::get('mecha.partsOfMecha');

    }
    

    public function getPoints(){
        $sumOfHurts=0;

        $startedPoints= $this->mechaDescription->salute;

        foreach( $this->hurts as $hurt ){

            $sumOfHurts += $hurt->hurt;

        }

        return [
            'fullpoints' => $startedPoints,
            'pointsNow' => $startedPoints - $sumOfHurts
        ];
    }

    public function getPartsHurted(){
        $hurts= $this->hurts;

        $partshurted=[];

        foreach( $hurts as $hurt ){
            
            $hurtDescription=[
                'descrizione' => $hurt->descrizione,
                'hurt' => $hurt->hurt,
                'assignedBy' => $hurt->user->name
            ];

            $partshurted[$hurt->partOfMecha][]=$hurtDescription;

        }

        return $partshurted;
    }

    public function getStatistics(){

        $mecha= $this->mechaDescription;

        $mechaObjects=$this->objects;

        $statisticSum=[
            'velocita' => $mecha->velocita,
            'potenza' => $mecha->potenza,
            'resistenza' => $mecha->resistenza
        ];
        
        foreach( $mechaObjects as $object ){

            $objectDescription = $object->objectDescription;

            $statisticSum['velocita'] += $objectDescription->velocita;

            $statisticSum['resistenza'] += $objectDescription->resistenza;

            $statisticSum['potenza'] += $objectDescription->potenza;

    }

        return $statisticSum;
    }

}

?>