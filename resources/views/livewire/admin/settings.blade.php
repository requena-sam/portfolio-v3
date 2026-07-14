<div>
    <div class="admin-page-head">
        <div>
            <p class="admin-eyebrow">Paramètres</p>
            <h1 class="admin-page-title">Changer le mot de passe</h1>
        </div>
    </div>

    <form wire:submit="updatePassword" class="admin-form-narrow">
        @if ($saved)
            <p class="admin-success">Mot de passe mis à jour.</p>
        @endif

        <div class="admin-field">
            <label class="admin-label" for="currentPassword">Mot de passe actuel</label>
            <input type="password" id="currentPassword" wire:model="currentPassword" class="admin-input" autocomplete="current-password">
            @error('currentPassword') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label" for="password">Nouveau mot de passe</label>
            <input type="password" id="password" wire:model="password" class="admin-input" autocomplete="new-password">
            @error('password') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label" for="password_confirmation">Confirmer le nouveau mot de passe</label>
            <input type="password" id="password_confirmation" wire:model="password_confirmation" class="admin-input" autocomplete="new-password">
        </div>

        <button type="submit" class="admin-btn admin-btn-primary">Mettre à jour</button>
    </form>
</div>
