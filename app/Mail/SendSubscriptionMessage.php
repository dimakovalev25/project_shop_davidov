<?php

namespace App\Mail;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendSubscriptionMessage extends Mailable
{
    use Queueable, SerializesModels;


    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function build()
    {
        return $this->view('mail.subscription');
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Subscription Message',
        );
    }
    public function content(): Content
    {
        return new Content(
            view: 'mail.subscription',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
