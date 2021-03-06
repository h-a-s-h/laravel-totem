<?php

namespace Studio\Totem\Events;

use Studio\Totem\Task;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class BroadcastingEvent extends TaskEvent implements ShouldBroadcast
{
    use InteractsWithSockets;

    /**
     * @var Task
     */
    public $task;

    /**
     * constructor.
     *
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        parent::__construct($task);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\Channel[]|PrivateChannel
     */
    public function broadcastOn()
    {
        return new PrivateChannel(config('totem.broadcasting.channel'));
    }

    /**
     * Toggles event broadcasting on/off based on config value.
     *
     * @return bool
     */
    public function broadcastWhen()
    {
        return config('totem.broadcasting.enabled');
    }
}
