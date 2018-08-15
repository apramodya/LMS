<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Assignment extends Mailable
{
    use Queueable, SerializesModels;

	protected $message;
	protected $course;
	public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($assignment)
    {
	    $this->message = $assignment['message'];
	    $this->course = $assignment['course'];
	    $this->subject = 'Assignment - '.$assignment['course'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.assignment')
	        ->with(['msg' => $this->message, 'course' => $this->course]);
    }
}
