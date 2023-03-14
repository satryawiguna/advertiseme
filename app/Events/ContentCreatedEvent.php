<?php

namespace App\Events;

use App\Models\Content;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ContentCreatedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $_content;

    /**
     * Create a new event instance.
     */
    public function __construct(Content $content)
    {
        $this->_content = $content;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('advertiseme.channel.' . $this->_content->id),
        ];
    }

    public function broadcastWith()
    {
        return [
            'data' => $this->_content
        ];
    }
}
