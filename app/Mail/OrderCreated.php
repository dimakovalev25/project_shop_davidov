<?php

namespace App\Mail;

use App\Classes\Basket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $basket;

    public function __construct($name, Basket $basket)
    {
        $this->name = $name;
        $this->basket = $basket;
    }

    public function build()
    {
        $fullSumm = $this->basket->getOrder()->calculateFullSum();
        return $this->view('mail.order_created', ['name' => $this->name, 'fullSumm'=> $fullSumm, 'basket' => $this->basket]);
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Created',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.order_created',

        );
    }

    public function attachments(): array
    {
        return [];
    }
}
