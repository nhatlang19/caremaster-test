<?php

namespace App\Listeners;

use App\Events\SendEmailEvent;
use App\Mail\NewCompanyNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailListener
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
     * @param  SendEmailEvent  $event
     * @return void
     */
    public function handle(SendEmailEvent $event)
    {
        $company = $event->company();

        Mail::to($company->email)->send(new NewCompanyNotification($company));
    }
}
