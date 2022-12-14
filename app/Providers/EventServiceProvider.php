<?php

namespace App\Providers;

use App\Events\DocumentUpload;
use App\Events\TicketCreation;
use App\Listeners\SendDocumentUploadNotification;
use App\Listeners\SendNewNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TicketCreation::class => [
            SendNewNotification::class
        ],
        DocumentUpload::class => [
            SendDocumentUploadNotification::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
