<?php

namespace App\Livewire\Admin\Projects;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProjectForm extends Component
{
    public ?Project $project = null;

    public string $slug = '';

    public string $name = '';

    public string $icon = '';

    public ?string $logoUrl = null;

    public string $type = '';

    public ?int $year = null;

    public bool $featured = false;

    public ?string $summary = null;

    public string $description = '';

    public ?string $link = null;

    public ?string $githubLink = null;

    public array $stack = [];

    public array $colorPalette = [];

    public array $images = [];

    public function mount(?int $projectId = null): void
    {
        $project = $projectId ? Project::findOrFail($projectId) : null;
        $this->project = $project;

        if ($project) {
            $this->slug = $project->slug;
            $this->name = $project->name;
            $this->icon = $project->icon;
            $this->logoUrl = $project->logo_url;
            $this->type = $project->type;
            $this->year = $project->year;
            $this->featured = $project->featured;
            $this->summary = $project->summary;
            $this->description = $project->description;
            $this->link = $project->link;
            $this->githubLink = $project->github_link;
            $this->stack = array_map('strval', $project->stack);
            $this->colorPalette = $project->color_palette ?: [''];
            $this->images = array_map(fn (array $image) => [
                'url' => $image['url'] ?? '',
                'alt' => $image['alt'] ?? '',
                'main' => $image['main'] ?? false,
            ], $project->images);
        } else {
            $this->colorPalette = [''];
            $this->images = [$this->blankImage()];
        }
    }

    private function blankImage(): array
    {
        return [
            'url' => '',
            'alt' => '',
            'main' => false,
        ];
    }

    public function addColorItem(): void
    {
        $this->colorPalette[] = '';
    }

    public function removeColorItem(int $index): void
    {
        unset($this->colorPalette[$index]);
        $this->colorPalette = array_values($this->colorPalette);
    }

    public function addImageItem(): void
    {
        $this->images[] = $this->blankImage();
    }

    public function removeImageItem(int $index): void
    {
        unset($this->images[$index]);
        $this->images = array_values($this->images);
    }

    public function setMainImage(int $index): void
    {
        foreach ($this->images as $i => $image) {
            $this->images[$i]['main'] = $i === $index;
        }
    }

    protected function projectTypes(): array
    {
        return collect(__('projects.filters'))->keys()->reject(fn ($key) => $key === 'all')->values()->all();
    }

    protected function rules(): array
    {
        return [
            'slug' => [
                'required', 'string', 'max:255', 'alpha_dash',
                Rule::unique('projects', 'slug')->ignore($this->project?->id),
            ],
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:16'],
            'logoUrl' => ['nullable', 'url', 'max:2048'],
            'type' => ['required', Rule::in($this->projectTypes())],
            'year' => ['required', 'integer', 'min:2000', 'max:'.(date('Y') + 1)],
            'featured' => ['boolean'],
            'summary' => ['nullable', 'string', 'max:1000'],
            'description' => ['required', 'string', 'max:5000'],
            'link' => ['nullable', 'url', 'max:255'],
            'githubLink' => ['nullable', 'url', 'max:255'],
            'stack' => ['required', 'array', 'min:1'],
            'stack.*' => ['required', Rule::exists('skills', 'id')],
            'colorPalette' => ['nullable', 'array'],
            'colorPalette.*' => ['nullable', 'string', 'max:9', 'regex:/^#[0-9A-Fa-f]{3,8}$/'],
            'images' => ['required', 'array', 'min:1'],
            'images.*.url' => ['nullable', 'url', 'max:2048'],
            'images.*.alt' => ['required', 'string', 'max:255'],
            'images.*.main' => ['boolean'],
        ];
    }

    public function save(): void
    {
        $this->logoUrl = $this->logoUrl !== '' ? trim((string) $this->logoUrl) : null;
        $this->link = $this->link !== '' ? trim((string) $this->link) : null;
        $this->githubLink = $this->githubLink !== '' ? trim((string) $this->githubLink) : null;

        $validated = $this->validate($this->rules());

        $images = array_map(fn (array $image) => [
            'url' => $image['url'] ?: null,
            'alt' => $image['alt'],
            'main' => $image['main'],
        ], $validated['images']);

        $data = [
            'slug' => $validated['slug'],
            'name' => $validated['name'],
            'icon' => $validated['icon'],
            'logo_url' => $validated['logoUrl'],
            'type' => $validated['type'],
            'year' => $validated['year'],
            'featured' => $validated['featured'],
            'summary' => $validated['summary'],
            'description' => $validated['description'],
            'link' => $validated['link'],
            'github_link' => $validated['githubLink'],
            'stack' => array_map('intval', $validated['stack']),
            'color_palette' => array_values(array_filter($validated['colorPalette'] ?? [])),
            'images' => $images,
        ];

        if ($this->project) {
            $this->project->update($data);
        } else {
            $data['order'] = (int) (Project::query()->max('order')) + 1;
            Project::create($data);
        }

        $this->dispatch('closeProjectForm');
    }

    public function cancel(): void
    {
        $this->dispatch('closeProjectForm');
    }

    public function render()
    {
        return view('livewire.admin.projects.project-form', [
            'projectTypes' => $this->projectTypes(),
            'availableSkills' => Skill::query()->orderBy('order')->get(),
        ]);
    }
}
