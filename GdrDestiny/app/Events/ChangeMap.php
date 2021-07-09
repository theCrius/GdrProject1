<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChangeMap 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user, $infoMaps;

    /**
     * Create a new event instance.
     * @param array $infoMaps [ nameroute , parametres ]
     * @return void
     */
    public function __construct($user,$nameRouteMap,$parametres)
    {
        $this->user = $user;

        //bug, da come valore uno e poi abbiamo errori con vuejs
        if($nameRouteMap === 'topmap') $parametres = [];

        $this->infoMaps=[
            'nameRoute' => $nameRouteMap,
            'parametres' => $parametres
        ];


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
