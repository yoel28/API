<?php

namespace Api\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ActionsEvents
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $actions;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($actions)
    {
        $this->actions =  $actions;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        echo 'node';
        return new PrivateChannel('channel-name');
    }
}
