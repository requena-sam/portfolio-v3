{{-- Shared header wrapper for the About, Projects and Project detail pages.
     Each page provides its own inner content (avatar intro or title+subtitle) as the slot. --}}
@props([
    'backRoute' => null,
    'backLabel' => null,
])
<section id="pagehero">
    <div id="pagehero-grid"></div>
    <div id="pagehero-glow"></div>
    <div class="w">
        <a href="{{ $backRoute ?? route('home') }}" class="back-link reveal">{{ $backLabel ?? __('common.back_to_home') }}</a>
        {{ $slot }}
    </div>
</section>
