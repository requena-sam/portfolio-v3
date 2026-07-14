<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Illuminate\Validation\Rule;
use Livewire\Component;

class SkillForm extends Component
{
    public ?Skill $skill = null;

    public string $name = '';

    public string $svg = '';

    public string $level = '';

    public bool $home = false;

    public function mount(?int $skillId = null): void
    {
        $skill = $skillId ? Skill::findOrFail($skillId) : null;
        $this->skill = $skill;

        if ($skill) {
            $this->name = $skill->name;
            $this->svg = $skill->svg;
            $this->level = $skill->level;
            $this->home = $skill->home;
        }
    }

    protected function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255',
                Rule::unique('skills', 'name')->ignore($this->skill?->id),
            ],
            'svg' => ['required', 'string', 'starts_with:<svg'],
            'level' => ['required', Rule::in(Skill::LEVELS)],
            'home' => ['boolean'],
        ];
    }

    public function save(): void
    {
        $this->svg = trim($this->svg);

        $validated = $this->validate($this->rules());

        if ($this->skill) {
            $this->skill->update($validated);
        } else {
            $validated['order'] = (int) (Skill::query()->max('order')) + 1;
            Skill::create($validated);
        }

        $this->dispatch('closeSkillForm');
    }

    public function cancel(): void
    {
        $this->dispatch('closeSkillForm');
    }

    public function render()
    {
        return view('livewire.admin.skills.skill-form', [
            'levels' => Skill::LEVELS,
        ]);
    }
}
