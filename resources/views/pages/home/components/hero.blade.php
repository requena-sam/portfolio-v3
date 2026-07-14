<section id="hero">
    <div id="hero-grid"></div>
    <div id="hero-orbs">
        <div class="h-orb h-orb-1"></div>
        <div class="h-orb h-orb-2"></div>
        <div class="h-orb h-orb-3"></div>
    </div>
    <div id="hero-code">
        <span class="code-fragment cf-1">const dev = "freelance";</span>
        <span class="code-fragment cf-2">{ status: "available" }</span>
        <span class="code-fragment cf-3">npm run build →</span>
        <span class="code-fragment cf-4">&lt;Portfolio /&gt;</span>
        <span class="code-fragment cf-5">git commit -m "ship it"</span>
    </div>

    <x-decor.robot variant="square" id="hero-robot" />
    <x-decor.robot variant="dome" id="hero-robot-left" />

    <div class="w">
        <div class="hero-eyebrow">
            <span class="dot-g"></span>
            {{ __('home.hero.eyebrow') }}
        </div>

        <h1 class="hero-h1">
            <span class="reveal-line"><span>{{ __('home.hero.title_line_1') }}</span></span>
            <span class="reveal-line"><span>{{ __('home.hero.title_line_2_before') }}<span class="blue">{{ __('home.hero.title_line_2_highlight') }}</span>.</span></span>
        </h1>

        <p class="hero-body">{!! __('home.hero.body') !!}</p>

        <div class="hero-ctas">
            <x-button variant="blue" href="#contact">{{ __('home.hero.cta_primary') }}</x-button>
            <x-button variant="dark" href="{{ route('projects') }}">{{ __('home.hero.cta_secondary') }}</x-button>
        </div>

        <div class="hero-stats">
            @foreach (__('home.hero.stats') as $stat)
                <div class="hero-stat">
                    <div class="hero-stat-num">
                        @if ($stat['count'])
                            <span class="blue" data-count="{{ $stat['count'] }}">0</span>{{ $stat['suffix'] }}
                        @else
                            {{ $stat['value'] }}
                        @endif
                    </div>
                    <div class="hero-stat-lbl">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="hero-scroll-cue">
        <div class="scroll-mouse"><div class="scroll-mouse-dot"></div></div>
    </div>
</section>
