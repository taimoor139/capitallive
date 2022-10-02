<?php

namespace App\Listeners;

use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendDocumentUploadNotification
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
            'type' => 3,
            'ticket_id' => $event->document_id
        ]);
    }
}
