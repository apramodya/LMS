<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notice extends Mailable
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
    public function __construct($mail)
    {
        //
	    $this->title = $mail['title'];
	    $this->message = $mail['message'];
	    $this->course = $mail['course'];
	    $this->subject = 'Notice - '.$mail['course'];
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
	        ->with(['msg' => $this->message, 'course' => $this->course, 'title' => $this->title]);
    }
}
