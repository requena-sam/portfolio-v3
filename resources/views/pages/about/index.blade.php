<x-layout :title="__('about.meta.title')" :description="__('about.meta.description')" active="about">
    <x-page-hero>
        <div class="page-intro reveal reveal-delay-1">
            <div class="page-avatar">SR</div>
            <div class="page-intro-text">
                <h1 class="page-intro-name">Sam <span class="blue">Requena</span></h1>
                <p class="page-intro-role">{{ __('about.hero.role') }}</p>
                <div class="page-intro-tags">
                    @foreach (__('about.hero.tags') as $tag)
                        <span class="page-tag">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </x-page-hero>

    @include('pages.about.components.who-section')
    @include('pages.about.components.skills-section')
    @include('pages.about.components.timeline-section')
</x-layout>
