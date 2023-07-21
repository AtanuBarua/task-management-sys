<?php

namespace App\Listeners;

use App\Events\TaskAssigned;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NotifyAssignee;
use Illuminate\Support\Facades\Mail;

class SendMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\TaskAssigned  $event
     * @return void
     */
    public function handle(TaskAssigned $event)
    {
        Mail::to($event->email)->queue(new NotifyAssignee());
    }
}
