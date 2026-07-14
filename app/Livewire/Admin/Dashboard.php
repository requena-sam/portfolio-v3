<?php

namespace App\Livewire\Admin;

use App\Models\ContactMessage;
use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.admin.layout')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard', [
            'projectCount' => Project::query()->count(),
            'unreadMessageCount' => ContactMessage::query()->whereNull('read_at')->count(),
        ]);
    }
}
