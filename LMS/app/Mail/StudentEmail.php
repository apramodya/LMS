<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StudentEmail extends Mailable
{
    use Queueable, SerializesModels;

	protected $title;
	protected $body;
	protected $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail)
    {
	    $this->title = $mail['title'];
	    $this->body = $mail['body'];
	    $this->sender = $mail['sender'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.email')
                    ->with(['body' => $this->body, 'title' => $this->title, 'sender' => $this->sender]);
    }
}
