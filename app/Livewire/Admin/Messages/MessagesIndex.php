<?php

namespace App\Livewire\Admin\Messages;

use App\Models\ContactMessage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.admin.layout')]
class MessagesIndex extends Component
{
    use WithPagination;

    public function markAsRead(int $messageId): void
    {
        ContactMessage::query()->findOrFail($messageId)->update(['read_at' => now()]);
    }

    public ?int $confirmingDeleteId = null;

    public function confirmDelete(int $messageId): void
    {
        $this->confirmingDeleteId = $messageId;
    }

    public function cancelDelete(): void
    {
        $this->confirmingDeleteId = null;
    }

    public function deleteMessage(): void
    {
        if ($this->confirmingDeleteId) {
            ContactMessage::query()->findOrFail($this->confirmingDeleteId)->delete();
            $this->confirmingDeleteId = null;
        }
    }

    public function render()
    {
        return view('livewire.admin.messages.messages-index', [
            'messages' => ContactMessage::query()->latest()->paginate(20),
        ]);
    }
}
