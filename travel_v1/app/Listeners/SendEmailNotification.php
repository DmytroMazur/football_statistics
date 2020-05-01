<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailNotification
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $userName = $event->name;
        $userEmail = $event->email;
        $data = [
            'name' => $userName,
            'email' => $userEmail
        ];
        /*Mail::send(
            'emails.mail',
            $data,
            function ($message) use ($data) {
                $message->to($data['email'])
                    ->subject('Welcome to our Website');
                $message->from('noreply@test.es');
            }
        );*/
    }
}
