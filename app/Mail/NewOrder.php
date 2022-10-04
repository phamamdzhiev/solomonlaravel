<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $mobile;
    protected $prodID;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $mobile, $prodID)
    {
        $this->name = $name;
        $this->mobile = $mobile;
        $this->prodID = $prodID;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->view('mailables.new-order', [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'prodID' => $this->prodID
        ]);
    }
}
