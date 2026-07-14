<div>
    <div class="admin-page-head">
        <div>
            <p class="admin-eyebrow">Boîte de réception</p>
            <h1 class="admin-page-title">Messages de contact</h1>
        </div>
    </div>

    <div class="admin-panel">
        @forelse ($messages as $contactMessage)
            <details class="admin-message" wire:key="message-{{ $contactMessage->id }}">
                <summary class="{{ $contactMessage->isRead() ? '' : 'admin-row-unread' }}">
                    @unless ($contactMessage->isRead())
                        <span class="admin-badge admin-badge-unread">Non lu</span>
                    @endunless
                    {{ $contactMessage->name }} — {{ $contactMessage->subject }}
                    <span class="admin-message-meta">
                        ({{ $contactMessage->email }}, {{ $contactMessage->created_at->format('d/m/Y H:i') }})
                    </span>
                </summary>

                <p class="admin-message-body">{{ $contactMessage->message }}</p>

                <div class="admin-message-actions">
                    @unless ($contactMessage->isRead())
                        <button type="button" wire:click="markAsRead({{ $contactMessage->id }})" class="admin-btn admin-btn-secondary">Marquer comme lu</button>
                    @endunless
                    <button
                        type="button"
                        wire:click="confirmDelete({{ $contactMessage->id }})"
                        class="admin-btn admin-btn-danger"
                    >Supprimer</button>
                </div>
            </details>
        @empty
            <p class="admin-empty">Aucun message pour le moment.</p>
        @endforelse
    </div>

    <div class="admin-pagination">
        {{ $messages->links() }}
    </div>

    <x-admin.confirm-modal
        :show="(bool) $confirmingDeleteId"
        confirm-action="deleteMessage"
        title="Supprimer ce message ?"
    >
        Cette action est définitive et supprimera le message reçu.
    </x-admin.confirm-modal>
</div>
