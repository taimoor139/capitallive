<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mail_data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail_data)
    {
        $this->mail_data = $mail_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::query()->whereNotNull('email_verified_at')->get();
        $input['subject'] = $this->mail_data['subject'];
        $input['message'] = $this->mail_data['message'];

        foreach ($users as $user) {
            $input['email'] = $user->email;
            $input['name'] = $user->name;

            Mail::send([], [], function ($message) use ($input) {
                $message->to($input['email'], $input['name'])
                    ->subject($input['subject'])
                    ->setBody('<!DOCTYPE html>
                                <html>
                                <head>
                                    <meta charset="utf-8">
                                    <title>'.$input['subject'].'</title>
                                </head>
                                <body>
                                <h1>'.$input['subject'].'</h1>
                                <p>'.$input['message'].'</p>
                                </body>
                                </html>', 'text/html');

                $message->from(env('MAIL_USERNAME'));
            });
        }
    }
}
