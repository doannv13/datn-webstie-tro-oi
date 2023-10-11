<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Jobs\MailNotification;
use App\Models\User;
class NotificationEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    use SerializesModels;
    public $user;
   /**
     * Create a new event instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct()
    {
        $data['email'][0] = 'lmt.3102003@gmail.com';


        dispatch(new MailNotification($data));
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
