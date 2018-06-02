<?php

namespace App\Events;

use App\Models\Tag;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TagBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Tag
     */
    public $tag;
    /**
     * @var null|String
     */
    private $type;

    /**
     * Create a new event instance.
     *
     * @param Tag $tag
     * @param string|null $type
     */
    public function __construct(Tag $tag, String $type = null)
    {
        $this->tag = $tag;

        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('tags');
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        switch ($this->type) {
            case 'STORE':
                return [
                    'status' => 'created',
                    'response' => $this->tag
                ];
                break;
            case 'UPDATE':
                return [
                    'status' => 'updated',
                    'response' => $this->tag
                ];
                break;
        }
    }
}
