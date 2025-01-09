<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $phone_no;
    public $email;
    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $phone_no, $email, $message)
    {
        $this->name = (string) $name;
        $this->phone_no = (string) $phone_no;
        $this->email = (string) $email;
        $this->message = (string) $message;
        // echo($this->phone_no);
        // exit;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Contact Form')
        ->view('emails.contactForm')
        ->with([
            'name' => $this->name,
            'phone_no' => $this->phone_no,
            'email' => $this->email,
            'messages' => $this->message
        ]);
    }
}
