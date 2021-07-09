<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Classes\CheckStatusUser;

class OnlineStatus implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels , CheckStatusUser;

    private $user;
    public $usersOnline;
    /**
     * Create a new event instance.
     *  @param String $logInorOut 'login' or 'logout' or 'refresh'
     * @return void
     */
    public function __construct(\App\User $user , $status)
    {
        $this->user = $user;

        if( $status == 'login')
        {
            $this->usersOnline = $this->setStatusOnline();

        }elseif($status == 'logout')
        {
            $this->usersOnline = $this->setStatusOffline();


        }elseif($status == 'refresh')
        {
            $this->usersOnline = $this->refreshLastChat();


        }

    }

    public function broadcastAs()
    {
        return 'user.online';
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('onlineStatus');
    }

}
