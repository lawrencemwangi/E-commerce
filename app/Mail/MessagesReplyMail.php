<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MessagesReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $clientName;
    public $messageReply;

    /**
     * Create a new message instance.
     */
    public function __construct( $clientName , $messageReply)
    {
        $this->clientName   = $clientName;
        $this->messageReply = $messageReply;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Messages Reply Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'backend.emails.inquiry_reply',
            with: [
                'clientName'   => $this->clientName,
                'messageReply' => $this->messageReply,
            ]
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


    public function build()
    {
        return $this->subject('Reply to Your Inquiry - ' . config('app.name'))
                    ->view('backend.emails.inquiry_reply')
                    ->with([
                        'clientName'   => $this->clientName,
                        'messageReply' => $this->messageReply,
                    ]);
    }
}
