<section class="sec" id="timeline">
    <div class="sec-glow left"></div>
    <div class="w sec-inner-zoom">
        <x-section-heading
            num="03"
            :label="__('about.timeline.label')"
            :line1="__('about.timeline.title_line_1')"
            :line2="__('about.timeline.title_line_2')"
        />

        <ol class="timeline reveal reveal-delay-2">
            @foreach (__('about.timeline.items') as $item)
                <li class="tl-item">
                    <div class="tl-dot {{ $item['large'] ? 'large' : '' }}" aria-hidden="true"></div>
                    <div class="tl-date">{{ $item['date'] }}</div>
                    <h3 class="tl-title">{{ $item['title'] }}</h3>
                    <div class="tl-where">{{ $item['place'] }}</div>
                    <div class="tl-desc">{{ $item['text'] }}</div>
                    @if ($item['badge'])
                        <span class="tl-badge"><span class="dot-g" aria-hidden="true"></span>{{ $item['badge'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</section>
