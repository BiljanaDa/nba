<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CommentReceived extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $mailData;
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    public function build()
    {
        return $this->subject("Comment received")->view('emails/comment-received');
    }


}
