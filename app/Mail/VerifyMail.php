<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $txt = "<!DOCTYPE html>
                <html>
                <head>
                    <title>Welcome Email</title>
                </head>

                <body>
                <h2>Welcome to the site {$this->user ['name']}</h2>
                <br/>
                Your registered email-id is {$this->user['email']} , Please click on the below link to verify your email account
                <br/>
                <a href='{url('user/verify',$this->user->verifyUser->token)}'>Verify Email</a>
                </body>
                </html>
";
        
        
        $to = "default@gmail.com";
        $subject = "My subject";
       // $txt = $this->view('emails.verifyUser');
        $headers = "From: test@tcsesoft.com" . "\r\n" .
        "CC: somebodyelse@example.com";

        mail($to,$subject,$txt,$headers);


        return $this->
                subject(strtoupper("Verify your account!!"))
                ->from('test@tcsesoft.com', ucwords('BD matrimony'))
                ->view('emails.verifyUser');
    }
}