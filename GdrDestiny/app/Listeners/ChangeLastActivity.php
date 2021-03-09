<?php

namespace App\Listeners;

use App\Events\ChangeMap;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ChangeLastActivity
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
     * @param  ChangeMap  $event
     * @return void
     */
    public function handle(ChangeMap $event)
    {
        $event->user->last_chat = $event->infoMaps;
        $event->user->save();
    }
}
