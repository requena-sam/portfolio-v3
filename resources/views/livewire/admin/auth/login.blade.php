<div>
    <div class="admin-guest-logo">SR</div>
    <p class="admin-eyebrow">Espace admin</p>
    <h1 class="admin-guest-title">Connexion</h1>

    <form wire:submit="authenticate">
        <div class="admin-field">
            <label class="admin-label" for="email">Email</label>
            <input type="email" id="email" wire:model="email" class="admin-input" autofocus>
            @error('email') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label" for="password">Mot de passe</label>
            <input type="password" id="password" wire:model="password" class="admin-input">
            @error('password') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field admin-checkbox-row">
            <input type="checkbox" id="remember" wire:model="remember">
            <label class="admin-label" for="remember">Se souvenir de moi</label>
        </div>

        <button type="submit" class="admin-btn admin-btn-primary admin-btn-block">Se connecter</button>
    </form>
</div>
