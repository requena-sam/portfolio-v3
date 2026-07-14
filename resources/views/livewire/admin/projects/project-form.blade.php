<div>
    {{-- Pressing Enter in any single-line input (slug, stack tags, image url/alt...) would
         otherwise submit the whole form natively and close the modal unexpectedly — only
         the explicit "Enregistrer" button (or Enter while it's focused) should submit. --}}
    <form wire:submit="save" x-on:keydown.enter="$event.target.tagName === 'INPUT' && $event.preventDefault()">
        <div class="admin-field">
            <label class="admin-label" for="slug">Slug</label>
            <input type="text" id="slug" wire:model="slug" class="admin-input">
            @error('slug') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label" for="name">Nom</label>
            <input type="text" id="name" wire:model="name" class="admin-input">
            @error('name') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field-row">
            <div class="admin-field">
                <label class="admin-label" for="icon">Icône (emoji, utilisée si pas de logo)</label>
                <input type="text" id="icon" wire:model="icon" class="admin-input">
                @error('icon') <p class="admin-error">{{ $message }}</p> @enderror
            </div>

            <div class="admin-field">
                <label class="admin-label" for="year">Année</label>
                <input type="number" id="year" wire:model="year" class="admin-input">
                @error('year') <p class="admin-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="admin-field">
            <label class="admin-label" for="logoUrl">Logo de l'entreprise (URL, optionnel — remplace l'emoji)</label>
            <input type="url" id="logoUrl" wire:model="logoUrl" class="admin-input" placeholder="https://...">
            @error('logoUrl') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label" for="type">Type</label>
            <select id="type" wire:model="type" class="admin-select">
                <option value="">—</option>
                @foreach ($projectTypes as $key)
                    <option value="{{ $key }}">{{ $key }}</option>
                @endforeach
            </select>
            @error('type') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field admin-checkbox-row">
            <input type="checkbox" id="featured" wire:model="featured">
            <label class="admin-label" for="featured">Projet à la une (page d'accueil)</label>
        </div>

        <div class="admin-field">
            <label class="admin-label" for="summary">Résumé (page d'accueil, optionnel)</label>
            <textarea id="summary" wire:model="summary" class="admin-textarea"></textarea>
            @error('summary') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label" for="description">Description</label>
            <textarea id="description" wire:model="description" class="admin-textarea"></textarea>
            @error('description') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field-row">
            <div class="admin-field">
                <label class="admin-label" for="link">Lien du projet (optionnel)</label>
                <input type="url" id="link" wire:model="link" class="admin-input" placeholder="https://...">
                @error('link') <p class="admin-error">{{ $message }}</p> @enderror
            </div>

            <div class="admin-field">
                <label class="admin-label" for="githubLink">Lien GitHub (optionnel)</label>
                <input type="url" id="githubLink" wire:model="githubLink" class="admin-input" placeholder="https://github.com/...">
                @error('githubLink') <p class="admin-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="admin-field">
            <label class="admin-label">Stack technique</label>
            <div class="admin-skill-picker">
                @foreach ($availableSkills as $skill)
                    <label class="admin-skill-option">
                        <input type="checkbox" wire:model="stack" value="{{ $skill->id }}">
                        <span class="admin-skill-ico" aria-hidden="true">{!! $skill->svg !!}</span>
                        {{ $skill->name }}
                    </label>
                @endforeach
            </div>
            @error('stack') <p class="admin-error">{{ $message }}</p> @enderror
        </div>

        <div class="admin-field">
            <label class="admin-label">Palette de couleurs de l'app (optionnel, codes hex)</label>
            @foreach ($colorPalette as $i => $color)
                <div class="admin-repeater-row" wire:key="color-{{ $i }}">
                    <input type="text" wire:model="colorPalette.{{ $i }}" class="admin-input" placeholder="#972b63">
                    @if (! empty($color))
                        <span class="admin-color-swatch" style="background:{{ $color }}"></span>
                    @endif
                    <button type="button" wire:click="removeColorItem({{ $i }})" class="admin-btn admin-btn-secondary">Retirer</button>
                </div>
                @error("colorPalette.{$i}") <p class="admin-error">{{ $message }}</p> @enderror
            @endforeach
            <button type="button" wire:click="addColorItem" class="admin-btn admin-btn-secondary">Ajouter une couleur</button>
        </div>

        <div class="admin-field">
            <label class="admin-label">Images (lien + texte alternatif affiché si l'image ne charge pas)</label>
            @foreach ($images as $i => $image)
                <div class="admin-image-row" wire:key="image-{{ $i }}">
                    <input type="url" wire:model="images.{{ $i }}.url" class="admin-input" placeholder="https://... (lien de l'image)">
                    <input type="text" wire:model="images.{{ $i }}.alt" class="admin-input" placeholder="Texte alternatif">
                    <label class="admin-radio-label">
                        <input type="radio" name="main-image" wire:click="setMainImage({{ $i }})" @checked($image['main'])>
                        Principale
                    </label>
                    <button type="button" wire:click="removeImageItem({{ $i }})" class="admin-btn admin-btn-secondary">Retirer</button>
                </div>
                @error("images.{$i}.url") <p class="admin-error">{{ $message }}</p> @enderror
                @error("images.{$i}.alt") <p class="admin-error">{{ $message }}</p> @enderror
            @endforeach
            <button type="button" wire:click="addImageItem" class="admin-btn admin-btn-secondary">Ajouter une image</button>
        </div>

        <div class="admin-modal-actions">
            <button type="submit" class="admin-btn admin-btn-primary">Enregistrer</button>
            <button type="button" wire:click="cancel" class="admin-btn admin-btn-secondary">Annuler</button>
        </div>
    </form>
</div>
