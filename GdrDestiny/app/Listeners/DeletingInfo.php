<?php

namespace App\Listeners;

use App\Exp;
use App\Money;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\DeleteUser;

class DeletingInfo
{
    protected $token;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->token = \Str::random(16);
    }



    public function resetPg($exp,$money){

        \App\Resetuser::create(
            [
                'exp' =>  ( $exp * 3/4 ),
                'money' => $money,
                'codice' => $this->token
            ]
        );

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try{
            
            $exp = Exp::getSum($event->user->id);
            
            $money = Money::getSum($event->user->id);
           
            $event->user->notify(new DeleteUser($event->user->name,route('registrati1',$this->token)));
            
            $event->user->delete();

            
            
            
            $this->resetPg($exp,$money);

        }catch(\Exception $e){

            
            return $e->getMessage();

        }
        
        
    }
}
