<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build(){
        return $this->subject($this->data['subject'] ?? 'New Contact Message')
                    ->html(
                        "<h2>New Contact Message</h2>
                        <p><strong>Name:</strong> " . htmlspecialchars($this->data['name']) . "</p>
                        <p><strong>Email:</strong> " . htmlspecialchars($this->data['email']) . "</p>
                        <p><strong>Phone:</strong> " . htmlspecialchars($this->data['number'] ?? 'N/A') . "</p>
                        <p><strong>Subject:</strong> " . htmlspecialchars($this->data['subject'] ?? 'N/A') . "</p>
                        <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($this->data['message'])) . "</p>"
                    );
    }
}
