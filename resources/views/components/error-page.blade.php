@props([
    'code',
    'title',
    'message',
    'robot' => 'square-chat',
])

<x-layout :title="$title.' — Sam Requena'" active="error">
    <x-page-hero>
        <div class="error-page reveal reveal-delay-1">
            <x-decor.robot :variant="$robot" class="sec-bot float-a error-robot" />
            <p class="error-code">{{ $code }}</p>
            <h1 class="page-ttl">{{ $title }}</h1>
            <p class="page-sub">{{ $message }}</p>
            <div class="error-actions">
                <x-button variant="blue" :href="route('home')">← Retour en territoire connu</x-button>
            </div>
        </div>
    </x-page-hero>
</x-layout>
