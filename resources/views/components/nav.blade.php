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
    <button class="theme-switch" id="themeToggle" type="button" role="switch" aria-checked="false" aria-label="Basculer entre le mode clair et sombre">
        <svg class="theme-switch-icon theme-switch-icon-sun" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="4.5" stroke="currentColor" stroke-width="1.8"/><path d="M12 2.5v2.5M12 19v2.5M4.9 4.9l1.8 1.8M17.3 17.3l1.8 1.8M2.5 12h2.5M19 12h2.5M4.9 19.1l1.8-1.8M17.3 6.7l1.8-1.8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        <svg class="theme-switch-icon theme-switch-icon-moon" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 14.5A8.5 8.5 0 1 1 9.5 4a7 7 0 0 0 10.5 10.5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/></svg>
        <span class="theme-switch-thumb" aria-hidden="true"></span>
    </button>
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
