<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notice extends Mailable
{
    use Queueable, SerializesModels;

    protected $message;
    protected $course;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notice)
    {
        //
	    $this->message = $notice->message;
	    $this->course = $notice->course_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//    	dd($this->message);
        return $this->view('emails.notice')
	        ->with(['msg' => $this->message, 'course' => $this->course]);
    }
}
