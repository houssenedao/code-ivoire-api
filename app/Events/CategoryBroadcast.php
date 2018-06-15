<?php

namespace App\Events;

use App\Models\Category;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CategoryBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Category
     */
    public $category;

    /**
     * @var null|String
     */
    private $type;

    /**
     * Create a new event instance.
     *
     * @param Category $category
     * @param string|null $type
     */
    public function __construct(Category $category, String $type = null)
    {
        $this->category = $category;

        $this->type = $type;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('categories');
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
                    'response' => $this->category
                ];
                break;
            case 'UPDATE':
                return [
                    'status' => 'updated',
                    'response' => $this->category
                ];
                break;
        }
    }
}
