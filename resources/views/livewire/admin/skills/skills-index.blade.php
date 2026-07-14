<div>
    <div class="admin-page-head">
        <div>
            <p class="admin-eyebrow">Portfolio</p>
            <h1 class="admin-page-title">Compétences</h1>
        </div>

        <button type="button" wire:click="create" class="admin-btn admin-btn-primary">Nouvelle compétence</button>
    </div>

    <div class="admin-panel">
        <table class="admin-table">
            <thead>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Degré de maîtrise</th>
                    <th>Accueil</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($skills as $skill)
                    <tr wire:key="skill-{{ $skill->id }}">
                        <td class="admin-row-icon">{!! $skill->svg !!}</td>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->level }}</td>
                        <td>@if ($skill->home) <span class="admin-badge">Oui</span> @endif</td>
                        <td>
                            <div class="admin-actions">
                                <button type="button" wire:click="edit({{ $skill->id }})" class="admin-btn admin-btn-secondary admin-btn-sm">Éditer</button>
                                <button
                                    type="button"
                                    wire:click="confirmDelete({{ $skill->id }})"
                                    class="admin-btn admin-btn-danger admin-btn-sm"
                                >Supprimer</button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="admin-empty">Aucune compétence pour le moment.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="admin-pagination">
        {{ $skills->links() }}
    </div>

    @if ($showForm)
        <div class="admin-modal-overlay" wire:click.self="closeForm">
            <div class="admin-modal-panel">
                <div class="admin-modal-head">
                    <h2 class="admin-modal-title">{{ $editingId ? 'Modifier la compétence' : 'Nouvelle compétence' }}</h2>
                    <button type="button" wire:click="closeForm" class="admin-modal-close" aria-label="Fermer">&times;</button>
                </div>

                <livewire:admin.skills.skill-form :skill-id="$editingId" :key="'skill-form-'.($editingId ?? 'new')" />
            </div>
        </div>
    @endif

    <x-admin.confirm-modal
        :show="(bool) $confirmingDeleteId"
        confirm-action="deleteSkill"
        title="Supprimer cette compétence ?"
    >
        Cette action est définitive. Les projets qui l'utilisent dans leur stack ne l'afficheront plus.
    </x-admin.confirm-modal>
</div>
