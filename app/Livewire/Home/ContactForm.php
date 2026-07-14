<?php

namespace App\Livewire\Home;

use App\Mail\ContactMessage;
use App\Models\ContactMessage as ContactMessageRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
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

    // honeypot — left blank by humans, filled in by bots that auto-fill every field they find
    public string $website = '';

    // timestamp the form appeared; a submission within a couple seconds of that can't be a human typing
    public int $renderedAt = 0;

    public bool $sent = false;

    public function mount(): void
    {
        $this->renderedAt = time();
    }

    public function submit(): void
    {
        $this->validate();

        if (filled($this->website) || (time() - $this->renderedAt) < 3) {
            // looks like a bot — pretend it worked so it doesn't come back and retry
            $this->reset(['name', 'email', 'subject', 'message']);
            $this->sent = true;

            return;
        }

        $throttleKey = 'contact-form|'.request()->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, maxAttempts: 3)) {
            throw ValidationException::withMessages([
                'message' => __('home.contact.form.throttled'),
            ]);
        }

        RateLimiter::hit($throttleKey, decaySeconds: 600);

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
