<?php

namespace App\Listeners;

use App\Http\Controllers\ExpController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DeletingInfo
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $email = $event->user->email;
        $exp = ExpController::getSumOfExp($event->user->id);
        $money
        
    }
}
