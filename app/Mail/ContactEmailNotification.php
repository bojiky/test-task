<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Interfaces\ContactInterface;

class ContactEmailNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $contact;

    public function __construct(ContactInterface $contact)
    {
        $this->contact = $contact;
    }

    public function build()
    {
        return $this->view('emails.contact-email')
                    ->subject('Новый контакт');
    }
}