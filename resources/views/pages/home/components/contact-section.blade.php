<section class="sec" id="contact">
    <div class="sec-glow center"></div>

    <x-decor.robot variant="square-chat" id="contact-bot" class="sec-bot float-b" />

    <div class="w sec-inner-zoom">
        <x-section-heading
            num="05"
            :label="__('home.contact.label')"
            :line1="__('home.contact.title_line_1')"
            :line2="__('home.contact.title_line_2')"
        />

        <div class="contact-grid">
            <div class="reveal reveal-delay-2">
                <p class="contact-side-lbl">{{ __('home.contact.email_label') }}</p>
                <p class="contact-side-val"><a href="mailto:{{ __('home.contact.email') }}">{{ __('home.contact.email') }}</a></p>
                <p class="contact-side-lbl">{{ __('home.contact.availability_label') }}</p>
                <p class="contact-side-val">{{ __('home.contact.availability_value') }}</p>
                <p class="contact-side-lbl">{{ __('home.contact.socials_label') }}</p>
                <div class="contact-socials">
                    <a href="https://www.linkedin.com/in/sam-requena-85138b2b5/" target="_blank" rel="noopener" class="contact-social-btn" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="none"><path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2C18.5 11.6 17.4 10.5 15.8 10.5C15 10.5 14.2 10.9 13.7 11.6V10.7H11V18.5H13.7V13.6C13.7 12.9 14.3 12.3 15 12.3C15.7 12.3 16.3 12.9 16.3 13.6V18.5H18.5M7.5 9.2C8.3 9.2 9 8.6 9 7.7C9 6.9 8.3 6.2 7.5 6.2C6.6 6.2 6 6.9 6 7.7C6 8.6 6.6 9.2 7.5 9.2M8.8 18.5V10.7H6.2V18.5H8.8Z" fill="currentColor"/></svg></a>
                    <a href="https://github.com/requena-sam" target="_blank" rel="noopener" class="contact-social-btn" aria-label="GitHub"><svg viewBox="0 0 24 24" fill="none"><path d="M12 2C6.48 2 2 6.58 2 12.25C2 16.8 4.87 20.65 8.84 22C9.34 22.09 9.5 21.78 9.5 21.5C9.5 21.27 9.5 20.59 9.5 19.72C6.73 20.33 6.14 18.37 6.14 18.37C5.68 17.18 5.03 16.87 5.03 16.87C4.12 16.23 5.1 16.25 5.1 16.25C6.1 16.32 6.63 17.3 6.63 17.3C7.5 18.85 8.97 18.4 9.54 18.15C9.63 17.5 9.89 17.06 10.17 16.81C7.95 16.56 5.62 15.69 5.62 11.79C5.62 10.67 6 9.76 6.65 9.04C6.55 8.79 6.2 7.73 6.75 6.33C6.75 6.33 7.6 6.05 9.5 7.38C10.29 7.16 11.15 7.05 12 7.05C12.85 7.05 13.71 7.16 14.5 7.38C16.4 6.05 17.25 6.33 17.25 6.33C17.8 7.73 17.45 8.79 17.35 9.04C18 9.76 18.38 10.67 18.38 11.79C18.38 15.7 16.04 16.55 13.81 16.8C14.17 17.11 14.5 17.72 14.5 18.65C14.5 19.99 14.5 21.16 14.5 21.5C14.5 21.78 14.66 22.1 15.17 22C19.14 20.64 22 16.8 22 12.25C22 6.58 17.52 2 12 2Z" fill="currentColor"/></svg></a>
                </div>
            </div>

            <div class="reveal reveal-delay-3">
                <livewire:home.contact-form />
            </div>
        </div>
    </div>
</section>
