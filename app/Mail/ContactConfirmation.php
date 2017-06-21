<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $input = array(
            'subject'     => $this->data['subject'],
            'message'     => $this->data['message'],
            'name'     => $this->data['name'],
            'phone'     => $this->data['phone'],
            'email'     => $this->data['email'],
        );

        return $this->from("hello@nationaaljeugdontbijt.nl")
            ->subject('retroChick Bevestiging: ' . $this->data['subject'])
            ->view('email.contactConfirmationClean')
            ->with([
                'inputs' => $input,
            ]);

    }
}