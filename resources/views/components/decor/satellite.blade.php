{{-- Decorative drifting satellite, used in the "Expérience" section.
     Positioning/size/id are passed in via $attributes. --}}
<svg {{ $attributes }} viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
    <rect x="2" y="38" width="22" height="24" rx="2" fill="var(--accent-soft)" stroke="currentColor" stroke-width="2.5"/>
    <line x1="7" y1="44" x2="19" y2="44" stroke="currentColor" stroke-width="1.5" opacity=".55"/>
    <line x1="7" y1="50" x2="19" y2="50" stroke="currentColor" stroke-width="1.5" opacity=".55"/>
    <line x1="7" y1="56" x2="19" y2="56" stroke="currentColor" stroke-width="1.5" opacity=".55"/>
    <rect x="76" y="38" width="22" height="24" rx="2" fill="var(--accent-soft)" stroke="currentColor" stroke-width="2.5"/>
    <line x1="81" y1="44" x2="93" y2="44" stroke="currentColor" stroke-width="1.5" opacity=".55"/>
    <line x1="81" y1="50" x2="93" y2="50" stroke="currentColor" stroke-width="1.5" opacity=".55"/>
    <line x1="81" y1="56" x2="93" y2="56" stroke="currentColor" stroke-width="1.5" opacity=".55"/>
    <line x1="24" y1="50" x2="36" y2="50" stroke="currentColor" stroke-width="2.5"/>
    <line x1="64" y1="50" x2="76" y2="50" stroke="currentColor" stroke-width="2.5"/>
    <rect x="36" y="36" width="28" height="28" rx="6" fill="var(--accent-border)" stroke="currentColor" stroke-width="3"/>
    <circle class="sat-blink" cx="50" cy="50" r="4" fill="currentColor"/>
    <line x1="50" y1="36" x2="50" y2="24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
    <circle cx="50" cy="20" r="3.5" fill="currentColor"/>
</svg>
