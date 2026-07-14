@props([
    'show',
    'title' => 'Confirmer la suppression',
    'confirmLabel' => 'Supprimer',
    'confirmAction',
    'cancelAction' => 'cancelDelete',
])
@if ($show)
    <div class="admin-modal-overlay" wire:click.self="{{ $cancelAction }}">
        <div class="admin-modal-panel admin-modal-panel--sm">
            <div class="admin-modal-head">
                <h2 class="admin-modal-title">{{ $title }}</h2>
                <button type="button" wire:click="{{ $cancelAction }}" class="admin-modal-close" aria-label="Fermer">&times;</button>
            </div>

            <p class="admin-confirm-body">{{ $slot }}</p>

            <div class="admin-modal-actions">
                <button type="button" wire:click="{{ $confirmAction }}" class="admin-btn admin-btn-danger">{{ $confirmLabel }}</button>
                <button type="button" wire:click="{{ $cancelAction }}" class="admin-btn admin-btn-secondary">Annuler</button>
            </div>
        </div>
    </div>
@endif
