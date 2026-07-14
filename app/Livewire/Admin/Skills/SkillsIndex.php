<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.admin.layout')]
class SkillsIndex extends Component
{
    use WithPagination;

    public bool $showForm = false;

    public ?int $editingId = null;

    public function create(): void
    {
        $this->editingId = null;
        $this->showForm = true;
    }

    public function edit(int $skillId): void
    {
        $this->editingId = $skillId;
        $this->showForm = true;
    }

    #[On('closeSkillForm')]
    public function closeForm(): void
    {
        $this->showForm = false;
        $this->editingId = null;
    }

    public ?int $confirmingDeleteId = null;

    public function confirmDelete(int $skillId): void
    {
        $this->confirmingDeleteId = $skillId;
    }

    public function cancelDelete(): void
    {
        $this->confirmingDeleteId = null;
    }

    public function deleteSkill(): void
    {
        if ($this->confirmingDeleteId) {
            Skill::query()->findOrFail($this->confirmingDeleteId)->delete();
            $this->confirmingDeleteId = null;
        }
    }

    public function render()
    {
        return view('livewire.admin.skills.skills-index', [
            'skills' => Skill::query()->orderBy('order')->paginate(20),
        ]);
    }
}
