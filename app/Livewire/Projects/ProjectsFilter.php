<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectsFilter extends Component
{
    public function render()
    {
        return view('livewire.projects.projects-filter', [
            'projects' => Project::query()->orderBy('year', 'desc')->orderBy('order', 'desc')->orderBy('id', 'desc')->get(),
        ]);
    }
}
