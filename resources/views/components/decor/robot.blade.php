@props(['variant' => 'square'])

{{-- Decorative floating robot mascots. `variant` picks the SVG design:
     square (hero, about), square-star (avis), square-chat (contact),
     dome (hero-left), boxy (projects). Positioning/size/animation
     classes are passed in via $attributes (id, class). --}}

@switch($variant)
    @case('dome')
        <svg {{ $attributes }} viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="78" y1="18" x2="84" y2="10" stroke="#7C3AED" stroke-width="3" stroke-linecap="round"/>
            <circle class="robot-antenna-dot" cx="86" cy="7" r="4" fill="#A78BFA"/>
            <path d="M36 40 a24 24 0 0 1 48 0 v6 h-48 z" fill="#F5F3FF" stroke="#7C3AED" stroke-width="3"/>
            <g class="robot-eye">
                <circle cx="52" cy="32" r="4.5" fill="#7C3AED"/>
                <circle cx="68" cy="32" r="4.5" fill="#7C3AED"/>
            </g>
            <rect x="28" y="46" width="64" height="52" rx="14" fill="#F5F3FF" stroke="#7C3AED" stroke-width="3"/>
            <rect x="38" y="58" width="18" height="10" rx="3" fill="#DDD6FE" stroke="#7C3AED" stroke-width="1.5"/>
            <circle cx="74" cy="63" r="6" fill="none" stroke="#A78BFA" stroke-width="2.5"/>
            <line x1="38" y1="78" x2="82" y2="78" stroke="#DDD6FE" stroke-width="3" stroke-linecap="round"/>
            <line x1="38" y1="86" x2="70" y2="86" stroke="#DDD6FE" stroke-width="3" stroke-linecap="round"/>
            <circle cx="42" cy="104" r="7" fill="#F5F3FF" stroke="#7C3AED" stroke-width="3"/>
            <circle cx="78" cy="104" r="7" fill="#F5F3FF" stroke="#7C3AED" stroke-width="3"/>
        </svg>
        @break

    @case('boxy')
        <svg {{ $attributes }} viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="60" y1="22" x2="60" y2="32" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
            <circle class="robot-antenna-dot" cx="60" cy="17" r="5" fill="currentColor"/>
            <rect x="34" y="32" width="52" height="40" rx="16" fill="var(--accent-soft)" stroke="currentColor" stroke-width="3"/>
            <g class="robot-eye">
                <rect x="44" y="46" width="32" height="12" rx="6" fill="currentColor"/>
                <circle cx="52" cy="52" r="2.5" fill="var(--accent-soft)"/>
                <circle cx="68" cy="52" r="2.5" fill="var(--accent-soft)"/>
            </g>
            <rect x="42" y="74" width="36" height="26" rx="9" fill="var(--accent-soft)" stroke="currentColor" stroke-width="3"/>
            <circle cx="60" cy="87" r="6" fill="none" stroke="currentColor" stroke-width="2.5" opacity=".7"/>
        </svg>
        @break

    @case('square-star')
        <svg {{ $attributes }} viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="60" y1="18" x2="60" y2="28" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
            <circle class="robot-antenna-dot" cx="60" cy="13" r="5" fill="currentColor"/>
            <rect x="32" y="28" width="56" height="44" rx="14" fill="var(--accent-soft)" stroke="currentColor" stroke-width="3"/>
            <g class="robot-eye">
                <rect x="44" y="44" width="10" height="12" rx="5" fill="currentColor"/>
                <rect x="66" y="44" width="10" height="12" rx="5" fill="currentColor"/>
            </g>
            <rect x="50" y="61" width="20" height="4" rx="2" fill="var(--accent-border)"/>
            <rect x="38" y="76" width="44" height="34" rx="10" fill="var(--accent-soft)" stroke="currentColor" stroke-width="3"/>
            <path d="M60 87 L62.5 92 L68 92.5 L64 96 L65 101.5 L60 99 L55 101.5 L56 96 L52 92.5 L57.5 92Z" fill="var(--accent-border)" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
            <line x1="38" y1="86" x2="26" y2="96" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
            <line x1="82" y1="86" x2="94" y2="96" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
        </svg>
        @break

    @case('square-chat')
        <svg {{ $attributes }} viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="60" y1="20" x2="60" y2="30" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
            <circle class="robot-antenna-dot" cx="60" cy="15" r="4.5" fill="currentColor"/>
            <circle cx="60" cy="54" r="30" fill="var(--accent-soft)" stroke="currentColor" stroke-width="3"/>
            <g class="robot-eye">
                <circle cx="49" cy="52" r="5.5" fill="currentColor"/>
                <circle cx="71" cy="52" r="5.5" fill="currentColor"/>
            </g>
            <path d="M48 65 Q60 73 72 65" stroke="currentColor" stroke-width="3" stroke-linecap="round" fill="none" opacity=".7"/>
            <rect x="40" y="84" width="40" height="28" rx="10" fill="var(--accent-soft)" stroke="currentColor" stroke-width="3"/>
            <rect x="49" y="91" width="22" height="14" rx="2" fill="var(--accent-border)" stroke="currentColor" stroke-width="1.5"/>
            <path d="M49 92 L60 99 L71 92" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
            <line x1="40" y1="92" x2="28" y2="84" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
            <line x1="80" y1="92" x2="92" y2="84" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
        </svg>
        @break

    @default {{-- square: hero-robot / about-bot --}}
        <svg {{ $attributes }} viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line x1="60" y1="18" x2="60" y2="28" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
            <circle class="robot-antenna-dot" cx="60" cy="13" r="5" fill="currentColor"/>
            <rect x="32" y="28" width="56" height="44" rx="14" fill="var(--accent-soft)" stroke="currentColor" stroke-width="3"/>
            <g class="robot-eye">
                <rect x="44" y="44" width="10" height="12" rx="5" fill="currentColor"/>
                <rect x="66" y="44" width="10" height="12" rx="5" fill="currentColor"/>
            </g>
            <path d="M48 65 Q60 73 72 65" stroke="currentColor" stroke-width="3" stroke-linecap="round" fill="none" opacity=".7"/>
            <rect x="40" y="84" width="40" height="28" rx="10" fill="var(--accent-soft)" stroke="currentColor" stroke-width="3"/>
            <rect x="52" y="93" width="16" height="6" rx="3" fill="var(--accent-border)"/>
            <line x1="40" y1="92" x2="28" y2="84" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
            <line x1="80" y1="92" x2="92" y2="84" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
        </svg>
@endswitch
