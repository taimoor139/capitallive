<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class DocumentUpload
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $document_id;
    /**
     * @var string
     */
    public $message;


    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($document)
    {
        $this->document_id = $document->id;
        $this->message  = auth()->user()->username." Uploaded a new document. Document ID: {$document->id}";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
