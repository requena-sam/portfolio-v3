<div>
    <form wire:submit="submit">
        <div class="hp-field" aria-hidden="true">
            <label for="f-website">Site web</label>
            <input type="text" id="f-website" wire:model="website" tabindex="-1" autocomplete="off">
        </div>

        <div class="form-row-2">
            <div class="form-group">
                <label class="form-label" for="f-name">{{ __('home.contact.form.name_label') }}</label>
                <input
                    class="form-input @error('name') is-invalid @enderror"
                    type="text"
                    id="f-name"
                    wire:model="name"
                    placeholder="{{ __('home.contact.form.name_placeholder') }}"
                >
                @error('name') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div class="form-group">
                <label class="form-label" for="f-email">{{ __('home.contact.form.email_label') }}</label>
                <input
                    class="form-input @error('email') is-invalid @enderror"
                    type="email"
                    id="f-email"
                    wire:model="email"
                    placeholder="{{ __('home.contact.form.email_placeholder') }}"
                >
                @error('email') <p class="form-error">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label" for="f-subject">{{ __('home.contact.form.subject_label') }}</label>
            <input
                class="form-input @error('subject') is-invalid @enderror"
                type="text"
                id="f-subject"
                wire:model="subject"
                placeholder="{{ __('home.contact.form.subject_placeholder') }}"
            >
            @error('subject') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="f-message">{{ __('home.contact.form.message_label') }}</label>
            <textarea
                class="form-textarea @error('message') is-invalid @enderror"
                id="f-message"
                wire:model="message"
                placeholder="{{ __('home.contact.form.message_placeholder') }}"
            ></textarea>
            @error('message') <p class="form-error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="form-submit" wire:loading.attr="disabled" wire:target="submit">
            <span wire:loading.remove wire:target="submit">{{ __('home.contact.form.submit') }}</span>
            <span wire:loading wire:target="submit">{{ __('home.contact.form.submitting') }}</span>
        </button>
        <p class="form-note">{{ __('home.contact.form.note') }}</p>

        <div class="form-success @if ($sent) show @endif">{{ __('home.contact.form.success') }}</div>
    </form>
</div>
