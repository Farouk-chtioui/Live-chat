<?php

namespace App\Listeners;

use App\Events\Status;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateUserStatus implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  Status  $event
     * @return void
     */
    public function handle(Status $event)
    {
        $user = $event->user;
        $status = $event->status;

        // Update the user's status in the database
        $user->status = $status;
        $user->save();
    }
}
