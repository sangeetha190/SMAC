<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerOrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;

    /**
     * Create a new message instance.
     */
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
        // dd($this->mailData);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        if ($this->mailData->status == 'cancelled') {
            $subjectData='Cancellation';
        }
        elseif ($this->mailData->status == 'delivered') {
            $subjectData='Delivered';
        }else {
            $subjectData='Confirmation';
        }

        return new Envelope(
            subject: ' SDM Order'.' '.$subjectData.' '.'Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
