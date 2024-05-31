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
    private $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $qnt, $mobile, $prodID, $address, $email)
    {
        $this->name = $name;
        $this->mobile = $mobile;
        $this->prodID = $prodID;
        $this->qnt = $qnt;
        $this->email = $email;
        $this->address = $address;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), "Поръчка - $this->prodID")->subject("$this->name")->view('mailables.new-order', [
            'name' => $this->name,
            'mobile' => $this->mobile,
            'prodID' => $this->prodID,
            'email' => $this->email,
            'qnt' => $this->qnt,
            'address' => $this->address
        ]);
    }
}
