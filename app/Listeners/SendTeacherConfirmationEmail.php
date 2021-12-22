<?php

namespace App\Listeners;

use App\Events\TeacherAdded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendTeacherConfirmationEmail
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
     * @param  \App\Events\TeacherAdded  $event
     * @return void
     */
    public function handle(TeacherAdded $event)
    {
        \Mail::to($event->teacher->email)->send(
            new TeacherConfirmationEmail($event->teacher, $event->student)
        );
    }
}
