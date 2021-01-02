<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateDataUserPt2
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $dataToCheck;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Array $datas,User $user)
    {
        //take only the data not null and not about _method and _token
        foreach( $datas as $key => $dataNotNull ){

            if( $key === '_method' || $key === '_token' ) continue;

            if ( $dataNotNull ) $this->dataToCheck[$key] = $dataNotNull;

        }
        
        $this->user=$user;

        
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
