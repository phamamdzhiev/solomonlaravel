<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormOrderMail extends Mailable
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
    public function build(): static
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), "Заявка за нови марки - " . $this->data['names'])
            ->subject("Нови марки - " . $this->data['names'])
            ->view('mailables.formorder')->with('data', $this->data);
    }
}
