<div>
    <div class="admin-page-head">
        <div>
            <p class="admin-eyebrow">Portfolio</p>
            <h1 class="admin-page-title">Projets</h1>
        </div>

        <button type="button" wire:click="create" class="admin-btn admin-btn-primary">Nouveau projet</button>
    </div>

    <div class="admin-panel">
        <table class="admin-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Année</th>
                    <th>À la une</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr wire:key="project-{{ $project->id }}">
                        <td class="admin-row-icon">{{ $project->icon }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->type }}</td>
                        <td>{{ $project->year }}</td>
                        <td>@if ($project->featured) <span class="admin-badge">Oui</span> @endif</td>
                        <td>
                            <div class="admin-actions">
                                <button type="button" wire:click="edit({{ $project->id }})" class="admin-btn admin-btn-secondary admin-btn-sm">Éditer</button>
                                <button
                                    type="button"
                                    wire:click="confirmDelete({{ $project->id }})"
                                    class="admin-btn admin-btn-danger admin-btn-sm"
                                >Supprimer</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="admin-empty">Aucun projet pour le moment.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $projects->links() }}
    </div>

    @if ($showForm)
        <div class="admin-modal-overlay" wire:click.self="closeForm">
            <div class="admin-modal-panel">
                <div class="admin-modal-head">
                    <h2 class="admin-modal-title">{{ $editingId ? 'Modifier le projet' : 'Nouveau projet' }}</h2>
                    <button type="button" wire:click="closeForm" class="admin-modal-close" aria-label="Fermer">&times;</button>
                </div>

                <livewire:admin.projects.project-form :project-id="$editingId" :key="'project-form-'.($editingId ?? 'new')" />
            </div>
        </div>
    @endif

    <x-admin.confirm-modal
        :show="(bool) $confirmingDeleteId"
        confirm-action="deleteProject"
        title="Supprimer ce projet ?"
    >
        Cette action est définitive et supprimera le projet de la liste publique.
    </x-admin.confirm-modal>
</div>
