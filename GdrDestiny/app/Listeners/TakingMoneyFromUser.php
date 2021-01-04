<?php

namespace App\Listeners;

use App\Events\BuyingObjects;
use App\Money;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TakingMoneyFromUser
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
     * @param  BuyingObjects  $event
     * @return void
     */
    public function handle(BuyingObjects $event)
    {  
        $oggetto = $event->objectBought->object;
        if($event->objectBought->getTable() == 'usermecha')  $oggetto = $event->objectBought->mechaDescription;
            
        $newTransaction = new Money();
        $newTransaction->motivo = 'Acquisto ' . $oggetto->name ?? $oggetto->usermecha->mechaDescription->name;
        $newTransaction->soldi = - ($oggetto->prize ?? $oggetto->usermecha->mechaDescription->prize );
        $newTransaction->id_user_to = $event->objectBought->id_user ?? $event->objectBought->usermecha->id_user;
        
        $newTransaction->save();
        
    }
}
