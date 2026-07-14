@props([
    'title' => __('common.meta.site_name'),
    'description' => null,
    'active' => 'home',
    'scrollDots' => false,
])
@php
    $metaDescription = $description ?? __('common.meta.description');
    $canonicalUrl = url()->current();
    $shareImage = asset('og-image.png');
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<script>
(function () {
    if (localStorage.getItem('theme') === 'dark') document.documentElement.setAttribute('data-theme', 'dark');
})();
</script>
<title>{{ $title }}</title>
<meta name="description" content="{{ $metaDescription }}">
<link rel="canonical" href="{{ $canonicalUrl }}">

<meta property="og:type" content="website">
<meta property="og:site_name" content="{{ __('common.meta.site_name') }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $metaDescription }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:image" content="{{ $shareImage }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $metaDescription }}">
<meta name="twitter:image" content="{{ $shareImage }}">

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet" />
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
@livewireStyles
{{ $head ?? '' }}
</head>
{{-- About/Projects sit right below a #pagehero header, so their sections
     use tighter spacing than the Home page (which starts with the big hero). --}}
<body class="page-{{ $active }} {{ $active !== 'home' ? 'has-page-hero' : '' }}">

<div id="curtain"></div>

@if ($scrollDots)
    <x-scroll-dots />
@endif

<div id="cursor"></div>
<div id="cursor-trail"></div>

<x-nav :active="$active" />

<main>
{{ $slot }}
</main>

<x-footer />

<x-back-to-top />

@livewireScripts
</body>
</html>
