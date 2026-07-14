<div>
    <div class="proj-list">
        @forelse ($projects as $project)
            <x-projects::project-card
                :project="$project"
                context="list"
                wire:key="proj-{{ $project['slug'] }}"
            />
        @empty
            <p class="proj-desc">Aucun projet pour le moment.</p>
        @endforelse
    </div>
</div>
