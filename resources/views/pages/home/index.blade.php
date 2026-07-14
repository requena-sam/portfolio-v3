<x-layout :title="__('home.meta.title')" :description="__('home.meta.description')" active="home" :scroll-dots="true">
    @include('pages.home.components.hero')
    @include('pages.home.components.about-section')
    @include('pages.home.components.projects-preview-section')
    @include('pages.home.components.testimonials-section')
    @include('pages.home.components.experience-section')
    @include('pages.home.components.contact-section')
</x-layout>
