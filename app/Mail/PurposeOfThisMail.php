<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurposeOfThisMail extends Mailable
{
    use Queueable, SerializesModels;


        public $teacher;
        public $student;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($teacher, $student)
    {
        $this->teacher = $teacher;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.teacher-confirmation');
    }
}
