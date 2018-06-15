<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

class TaskProcessedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var string
     */
    private $action;

    /**
     * @var null
     */
    private $content;

    /**
     * Create a new notification instance.
     *
     * @param string $action
     * @param null $content
     */
    public function __construct(string $action, $content = null)
    {
        $this->action = $action;
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'action' => $this->action,
            'content' => $this->content,
            'end_at' => Carbon::now(),
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
