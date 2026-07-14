<div>
    <form wire:submit="save" x-on:keydown.enter="$event.target.tagName === 'INPUT' && $event.preventDefault()">
        <div class="admin-field">
            <label class="admin-label" for="name">Nom</label>
            <input type="text" id="name" wire:model="name" class="admin-input" placeholder="Vue.js">
            @error('name') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label" for="level">Degré de maîtrise</label>
            <select id="level" wire:model="level" class="admin-select">
                <option value="">—</option>
                @foreach ($levels as $lvl)
                    <option value="{{ $lvl }}">{{ $lvl }}</option>
                @endforeach
            </select>
            @error('level') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label" for="svg">Icône (code SVG complet)</label>
            <textarea id="svg" wire:model.blur="svg" class="admin-textarea admin-textarea-code" placeholder="<svg viewBox=&quot;0 0 24 24&quot;>...</svg>"></textarea>
            @error('svg') <p class="admin-error">{{ $message }}</p> @enderror
            @if ($svg)
                <div class="admin-svg-preview" aria-hidden="true">{!! $svg !!}</div>
            @endif
        </div>

        <div class="admin-field admin-checkbox-row">
            <input type="checkbox" id="home" wire:model="home">
            <label class="admin-label" for="home">Afficher sur la page d'accueil</label>
        </div>

        <div class="admin-modal-actions">
            <button type="submit" class="admin-btn admin-btn-primary">Enregistrer</button>
            <button type="button" wire:click="cancel" class="admin-btn admin-btn-secondary">Annuler</button>
        </div>
    </form>
</div>
