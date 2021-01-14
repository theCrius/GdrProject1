<?php

namespace App\Listeners;

use App\Events\ShowLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ConvertForeignToValue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ShowLog  $event
     * @return void
     */
    public function handle(ShowLog $event)
    {
        $arrayToReturn = [];
       
        foreach($event->values as $key => $value){

            $arrayToReturn[$key]=[
                \Str::singular( $value->getTable() ) => $value,
            ];

            foreach($event->namesRelationship as $nameRelation){
             
                $arrayToReturn[$key][$nameRelation]=$value[$nameRelation][$event->valueToGet];
                    

            }
           

        }

        return $arrayToReturn;


    }
}
