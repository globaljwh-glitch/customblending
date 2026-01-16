<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminFormNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $data;

    public function __construct($title, $data)
    {
        $this->title = $title;
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject($this->title)
            ->view('emails.admin.form-notification');
    }
}

