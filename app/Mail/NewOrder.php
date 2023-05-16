<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $mobile;
    private $prodID;
    private $qnt;
    private $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $qnt, $mobile, $prodID, $address)
    {
        $this->name = $name;
        $this->mobile = $mobile;
        $this->prodID = $prodID;
        $this->qnt = $qnt;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), "$this->prodID - $this->name")->subject("$this->name - $this->prodID")->view('mailables.new-order', [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'prodID' => $this->prodID,
            'qnt' => $this->qnt,
            'address' => $this->address
        ]);
    }
}
