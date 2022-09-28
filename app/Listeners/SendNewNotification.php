<?php

namespace App\Listeners;

use App\Models\Notification;
use App\Models\User;
use App\Notifications\NewTicketNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNewNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Notification::create([
            'notification' => 'Alert',
            'description' => $event->message,
            'status' => 1,
            'user_id' => auth()->user()->id,
            'type' => 2,
            'ticket_id' => $event->ticket_id
        ]);
    }
}
