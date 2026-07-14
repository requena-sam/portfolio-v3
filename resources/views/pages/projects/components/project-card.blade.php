{{-- Single project card. Shared by the homepage "projects preview" section
     and the full projects list (app/Livewire/Projects/ProjectsFilter). --}}
@props([
    'project',
    'context' => 'list',
    'revealClass' => 'reveal',
])

@php
    $teaser = $project['summary'] ?: \Illuminate\Support\Str::limit(strip_tags($project['description']), 160);
    $imageCount = count($project['images']);
    $detailUrl = route('projects.show', $project['slug']);
    $stackSkills = \App\Models\Skill::query()->whereIn('id', $project['stack'])->get()->keyBy('id');
@endphp

<article {{ $attributes->merge(['class' => trim("proj $revealClass tilt-card")]) }} data-type="{{ $project['type'] }}">
    <a href="{{ $detailUrl }}" class="proj-link-wrap">
        <div class="proj-top">
            <div class="proj-logo" aria-hidden="true">
                @if (! empty($project['logo_url']))
                    <img src="{{ $project['logo_url'] }}" alt="" class="proj-logo-img" loading="lazy">
                @else
                    {{ $project['icon'] }}
                @endif
            </div>
            <h3 class="proj-name">{{ $project['name'] }}</h3>
            <span class="proj-type">{{ $project['type'] }}</span>
            <span class="proj-yr">{{ $project['year'] }}</span>
        </div>

        <div class="proj-imgs count-{{ $imageCount }}">
            @foreach ($project['images'] as $image)
                <div class="proj-img {{ $image['main'] ?? false ? 'img-main' : '' }}">
                    @if (! empty($image['url']))
                        <img
                            src="{{ $image['url'] }}"
                            alt="{{ $image['alt'] }}"
                            class="proj-img-real"
                            loading="lazy"
                            onerror="this.classList.add('is-hidden'); this.nextElementSibling.classList.remove('is-hidden');"
                        >
                        <div class="proj-img-ph is-hidden"><span>{{ $image['alt'] }}</span></div>
                    @else
                        <div class="proj-img-ph"><span>{{ $image['alt'] }}</span></div>
                    @endif
                </div>
            @endforeach
        </div>

        <p class="proj-desc">{!! $teaser !!}</p>
    </a>

    <ul class="proj-stack">
        @foreach ($project['stack'] as $skillId)
            @if ($skill = $stackSkills->get($skillId))
                <li class="stag">{!! $skill->svg !!} {{ $skill->name }}</li>
            @endif
        @endforeach
    </ul>
</article>
