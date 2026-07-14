<x-layout :title="__('projects.meta.title')" :description="__('projects.meta.description')" active="projects">
    <x-page-hero>
        <h1 class="page-ttl reveal reveal-delay-1">{{ __('projects.hero.title_before') }}<span class="dim">{{ __('projects.hero.title_dim') }}</span></h1>
        <p class="page-sub reveal reveal-delay-2">{{ __('projects.hero.subtitle') }}</p>

        <livewire:projects.projects-filter />
    </x-page-hero>
</x-layout>
