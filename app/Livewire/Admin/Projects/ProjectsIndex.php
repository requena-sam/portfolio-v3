<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.admin.layout')]
class ProjectsIndex extends Component
{
    use WithPagination;

    public bool $showForm = false;

    public ?int $editingId = null;

    public function create(): void
    {
        $this->editingId = null;
        $this->showForm = true;
    }

    public function edit(int $projectId): void
    {
        $this->editingId = $projectId;
        $this->showForm = true;
    }

    #[On('closeProjectForm')]
    public function closeForm(): void
    {
        $this->showForm = false;
        $this->editingId = null;
    }

    public ?int $confirmingDeleteId = null;

    public function confirmDelete(int $projectId): void
    {
        $this->confirmingDeleteId = $projectId;
    }

    public function cancelDelete(): void
    {
        $this->confirmingDeleteId = null;
    }

    public function deleteProject(): void
    {
        if ($this->confirmingDeleteId) {
            Project::query()->findOrFail($this->confirmingDeleteId)->delete();
            $this->confirmingDeleteId = null;
        }
    }

    public function render()
    {
        return view('livewire.admin.projects.projects-index', [
            'projects' => Project::query()->orderBy('year', 'desc')->orderBy('order', 'desc')->orderBy('id', 'desc')->paginate(20),
        ]);
    }
}
