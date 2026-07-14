<section class="sec" id="about">
    <div class="sec-glow left"></div>

    <x-decor.robot variant="square" id="about-bot" class="sec-bot float-a" />

    <div class="w sec-inner-zoom">
        <x-section-heading
            num="01"
            :label="__('home.about.label')"
            :line1="__('home.about.title_line_1')"
            :line2="__('home.about.title_line_2')"
        />

        <div class="about-row">
            <div>
                @foreach (__('home.about.paragraphs') as $i => $paragraph)
                    <p class="about-p reveal reveal-delay-{{ $i + 2 }}">{!! $paragraph !!}</p>
                @endforeach
            </div>

            <div class="reveal reveal-delay-2">
                <ul class="tech-wrap">
                    @foreach (\App\Models\Skill::query()->where('home', true)->orderBy('order')->get() as $skill)
                        <li class="tech-row {{ $skill->level === 'Très bonne maîtrise' ? 'tech-row--top' : '' }}">
                            <div class="tech-ico" aria-hidden="true">{!! $skill->svg !!}</div>
                            {{ $skill->name }} <span class="tech-yr">{{ $skill->level }}</span>
                        </li>
                    @endforeach
                </ul>

                <x-button variant="ghost" :href="route('about').'#skills'" class="tech-see-more">
                    Voir toute la stack →
                </x-button>
            </div>
        </div>
    </div>
</section>
