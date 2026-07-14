<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.admin.layout')]
class Settings extends Component
{
    public string $currentPassword = '';

    public string $password = '';

    public string $password_confirmation = '';

    public bool $saved = false;

    protected function rules(): array
    {
        return [
            'currentPassword' => ['required', 'current_password'],
            'password' => ['required', 'string', 'confirmed', Password::default()],
        ];
    }

    public function updatePassword(): void
    {
        $validated = $this->validate();

        Auth::user()->update(['password' => $validated['password']]);

        $this->reset(['currentPassword', 'password', 'password_confirmation']);
        $this->saved = true;
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}
