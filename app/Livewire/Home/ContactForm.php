<?php

namespace App\Livewire\Home;

use App\Mail\ContactMessage;
use App\Models\ContactMessage as ContactMessageRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Throwable;

class ContactForm extends Component
{
    #[Validate('required|string|max:255')]
    public string $name = '';

    #[Validate('required|email:rfc|max:255')]
    public string $email = '';

    #[Validate('required|string|max:255')]
    public string $subject = '';

    #[Validate('required|string|max:5000')]
    public string $message = '';

    public bool $sent = false;

    public function submit(): void
    {
        $this->validate();

        ContactMessageRecord::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // The message is already saved above, so a mailer outage shouldn't
        // block the confirmation shown to the visitor.
        try {
            Mail::to(__('home.contact.email'))->send(new ContactMessage(
                senderName: $this->name,
                senderEmail: $this->email,
                messageSubject: $this->subject,
                body: $this->message,
            ));
        } catch (Throwable $e) {
            Log::error('Contact form email failed to send: '.$e->getMessage());
        }

        $this->reset(['name', 'email', 'subject', 'message']);
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.home.contact-form');
    }
}
