<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserFormConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $messageText;

    public function __construct($name, $messageText)
    {
        $this->name = $name;
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this->subject('Thank you for contacting Custom Blending')
            ->view('emails.user.confirmation');
    }
}
