<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DefaultMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $title;
    public $bodyText;

    public function __construct($subject, $title, $bodyText)
    {
        $this->title = $title;
        $this->subject = $subject;
        $this->bodyText = $bodyText;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@matrimony.com')
            ->view('mail.default');
    }
}
