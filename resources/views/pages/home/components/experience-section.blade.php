<section class="sec" id="experience">
    <div class="sec-glow left"></div>

    <x-decor.satellite id="exp-satellite" class="sec-bot" />

    <div class="w sec-inner-zoom">
        <span class="sec-num">04</span>
        <p class="sec-lbl reveal">{{ __('home.experience.label') }}</p>
        <h2 class="sec-ttl reveal reveal-delay-1">{{ __('home.experience.title') }}</h2>

        <ol class="exp-grid">
            @foreach (__('home.experience.items') as $i => $item)
                <li class="exp-card {{ $item['badge_type'] === 'hire' ? 'exp-hire' : '' }} reveal reveal-delay-{{ $i + 1 }}">
                    <div class="exp-logo-w" aria-hidden="true"><x-ui-icon :name="$item['icon']" /></div>
                    <div class="exp-info">
                        <h3 class="exp-role">{{ $item['role'] }}</h3>
                        <div class="exp-co">{!! $item['place'] !!}</div>
                        <div class="exp-date">{{ $item['date'] }}</div>
                    </div>
                    @if ($item['badge'])
                        <span class="badge-{{ $item['badge_type'] }}">{{ $item['badge'] }}</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</section>
