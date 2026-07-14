<section class="sec" id="skills">
    <div class="sec-glow right"></div>
    <div class="w sec-inner-zoom">
        <x-section-heading
            num="02"
            :label="__('about.skills.label')"
            :line1="__('about.skills.title_line_1')"
            :line2="__('about.skills.title_line_2')"
        />

        <ul class="skills-grid">
            @foreach (\App\Models\Skill::query()->orderBy('order')->get() as $i => $skill)
                <li class="skill-card {{ $skill->level === 'Très bonne maîtrise' ? 'skill-card--top' : '' }} reveal reveal-delay-{{ ($i % 4) + 1 }}">
                    <div class="skill-ico" aria-hidden="true">{!! $skill->svg !!}</div>
                    <div>
                        <div class="skill-name">{{ $skill->name }}</div>
                        <div class="skill-level">{{ $skill->level }}</div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
