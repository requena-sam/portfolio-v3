@props(['active' => 'home'])

<nav id="mainnav" aria-label="Navigation principale">
    <a href="{{ route('home') }}" class="nav-logo" aria-label="{{ __('common.nav.home') }}">SR</a>
    <div class="nav-links-wrap" id="navLinks">
        <div class="nav-pill-bg" id="navPillBg" aria-hidden="true"></div>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="nav-link {{ $active === 'home' ? 'active' : '' }}">{{ __('common.nav.home') }}</a></li>
            <li><a href="{{ route('about') }}" class="nav-link {{ $active === 'about' ? 'active' : '' }}">{{ __('common.nav.about') }}</a></li>
            <li><a href="{{ route('projects') }}" class="nav-link {{ $active === 'projects' ? 'active' : '' }}">{{ __('common.nav.projects') }}</a></li>
        </ul>
    </div>
    <a href="{{ $active === 'home' ? '#contact' : route('home').'#contact' }}" class="nav-cta">
        <span class="dot-g" aria-hidden="true"></span><span class="label">{{ __('common.nav.cta_available') }}</span>
    </a>
    <button class="nav-burger" id="navBurger" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="nav-drawer"><span></span><span></span><span></span></button>
</nav>
<div id="nav-overlay" onclick="closeDrawer()"></div>
<div id="nav-drawer">
    <ul class="nav-drawer-links">
        <li><a href="{{ route('home') }}" class="{{ $active === 'home' ? 'active' : '' }}"><span aria-hidden="true">01</span>{{ __('common.nav.home') }}</a></li>
        <li><a href="{{ route('about') }}" class="{{ $active === 'about' ? 'active' : '' }}"><span aria-hidden="true">02</span>{{ __('common.nav.about') }}</a></li>
        <li><a href="{{ route('projects') }}" class="{{ $active === 'projects' ? 'active' : '' }}"><span aria-hidden="true">03</span>{{ __('common.nav.projects') }}</a></li>
    </ul>
    <a href="{{ $active === 'home' ? '#contact' : route('home').'#contact' }}" class="drawer-cta">
        <span class="dot-g" aria-hidden="true"></span>{{ __('common.nav.drawer_cta') }}
    </a>
</div>
