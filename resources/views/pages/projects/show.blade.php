@php
    $images = $project->images;
    $mainIndex = null;
    foreach ($images as $i => $image) {
        if (! empty($image['main'])) {
            $mainIndex = $i;
            break;
        }
    }
    if ($mainIndex === null && count($images)) {
        $mainIndex = 0;
    }
    $mainImage = $mainIndex !== null ? $images[$mainIndex] : null;
    $secondaryImages = $mainIndex !== null ? array_values(array_diff_key($images, [$mainIndex => true])) : $images;

    $stackSkills = \App\Models\Skill::query()->whereIn('id', $project->stack)->get()->keyBy('id');
@endphp

<x-layout
    :title="$project->name.' — Sam Requena'"
    :description="$project->summary ?: \Illuminate\Support\Str::limit(strip_tags($project->description), 160)"
    active="projects"
>
    <x-page-hero :back-route="route('projects')" :back-label="__('projects.back_to_projects')">
        <div class="proj-detail-head reveal reveal-delay-1">
            <div class="proj-detail-logo" aria-hidden="true">
                @if (! empty($project->logo_url))
                    <img src="{{ $project->logo_url }}" alt="" loading="lazy">
                @else
                    <span>{{ $project->icon }}</span>
                @endif
            </div>
            <div>
                <h1 class="page-ttl proj-detail-ttl">{{ $project->name }}</h1>
                <div class="proj-detail-meta">
                    <span class="proj-type">{{ $project->type }}</span>
                    <span class="proj-yr">{{ $project->year }}</span>
                </div>
            </div>
        </div>

        @if ($project->summary)
            <p class="page-sub reveal reveal-delay-2">{{ $project->summary }}</p>
        @endif
    </x-page-hero>

    <section class="sec proj-detail-sec">
        <div class="w">
            @if ($mainImage || count($secondaryImages))
                <div class="proj-gallery">
                    @if ($mainImage)
                        <div class="proj-gallery-main">
                            @if (! empty($mainImage['url']))
                                <img
                                    src="{{ $mainImage['url'] }}"
                                    alt="{{ $mainImage['alt'] }}"
                                    loading="lazy"
                                    onerror="this.classList.add('is-hidden'); this.nextElementSibling.classList.remove('is-hidden');"
                                >
                                <div class="proj-img-ph is-hidden"><span>{{ $mainImage['alt'] }}</span></div>
                            @else
                                <div class="proj-img-ph"><span>{{ $mainImage['alt'] }}</span></div>
                            @endif
                        </div>
                    @endif

                    @if (count($secondaryImages))
                        <div class="proj-gallery-grid">
                            @foreach ($secondaryImages as $image)
                                <div class="proj-gallery-img">
                                    @if (! empty($image['url']))
                                        <img
                                            src="{{ $image['url'] }}"
                                            alt="{{ $image['alt'] }}"
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
                    @endif
                </div>
            @endif

            <div class="proj-detail-content">
                <div class="proj-detail-desc">{!! $project->description !!}</div>

                <aside class="proj-detail-stack">
                    <div class="proj-detail-block">
                        <h3 class="proj-detail-heading">{{ __('projects.stack_heading') }}</h3>
                        <ul class="tech-wrap">
                            @foreach ($project->stack as $skillId)
                                @if ($skill = $stackSkills->get($skillId))
                                    <li class="tech-row">
                                        <div class="tech-ico" aria-hidden="true">{!! $skill->svg !!}</div>
                                        {{ $skill->name }}
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    @if (! empty($project->link) || ! empty($project->github_link))
                        <div class="proj-detail-block proj-detail-cta">
                            @if (! empty($project->link))
                                <x-button variant="blue" :href="$project->link" target="_blank" rel="noopener" class="proj-detail-btn">{{ __('projects.project_link_short') }}</x-button>
                            @endif
                            @if (! empty($project->github_link))
                                <x-button variant="dark" :href="$project->github_link" target="_blank" rel="noopener" class="proj-detail-btn">{{ __('projects.github_link_short') }}</x-button>
                            @endif
                        </div>
                    @endif
                </aside>
            </div>

            @if (! empty($project->color_palette))
                <div class="proj-detail-palette">
                    <h3 class="proj-detail-heading">{{ __('projects.color_palette') }}</h3>
                    <div class="proj-palette">
                        @foreach ($project->color_palette as $color)
                            <button type="button" class="proj-swatch" data-color="{{ $color }}" style="background:{{ $color }}">
                                <span class="proj-swatch-hex">{{ $color }}</span>
                            </button>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layout>
