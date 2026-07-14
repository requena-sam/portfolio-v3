@props([
    'variant' => 'dark',
    'href' => null,
])

@php
    $variantClass = match ($variant) {
        'blue' => 'cta-blue',
        'ghost' => 'see-all-btn',
        default => 'cta-dark',
    };
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    @if ($href) href="{{ $href }}" @endif
    {{ $attributes->merge(['class' => $variantClass]) }}
>{{ $slot }}</{{ $tag }}>
