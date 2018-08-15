<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Submission extends Mailable
{
    use Queueable, SerializesModels;

	protected $title;
	protected $message;
	protected $course;
	public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($submission)
    {
	    $this->title = $submission['title'];
	    $this->message = $submission['message'];
	    $this->course = $submission['course'];
	    $this->subject = 'Submission - '.$submission['course'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.submission')
	        ->with(['msg' => $this->message, 'course' => $this->course, 'title' => $this->title]);
    }
}
