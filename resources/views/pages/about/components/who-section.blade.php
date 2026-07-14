<section class="sec" id="about">
    <div class="sec-glow left"></div>
    <div class="w sec-inner-zoom">
        <x-section-heading
            num="01"
            :label="__('about.who.label')"
            :line1="__('about.who.title_line_1')"
            :line2="__('about.who.title_line_2')"
        />

        <div class="who-grid">
            <div>
                @foreach (__('about.who.paragraphs') as $i => $paragraph)
                    <p class="who-p reveal reveal-delay-{{ $i + 2 }}">{!! $paragraph !!}</p>
                @endforeach
            </div>

            <div class="who-photo-wrap reveal reveal-delay-2">
                <img src="{{ __('about.who.photo_url') }}" alt="Sam Requena" class="who-photo">

                @foreach (__('about.who.values') as $i => $value)
                    <div class="who-badge who-badge-{{ $i + 1 }}">
                        <span class="who-badge-icon" aria-hidden="true"><x-ui-icon :name="$value['icon']" /></span>
                        {{ $value['title'] }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
