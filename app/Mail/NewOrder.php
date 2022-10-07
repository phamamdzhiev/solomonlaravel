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
    protected $qnt;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $qnt, $mobile, $prodID)
    {
        $this->name = $name;
        $this->mobile = $mobile;
        $this->prodID = $prodID;
        $this->qnt = $qnt;
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
            'prodID' => $this->prodID,
            'qnt' => $this->qnt
        ]);
    }
}
