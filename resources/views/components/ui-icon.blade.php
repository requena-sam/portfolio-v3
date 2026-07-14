@props(['name'])

@switch($name)
    @case('briefcase')
        <svg viewBox="0 0 24 24" fill="none"><rect x="3" y="7" width="18" height="13" rx="2" stroke="currentColor" stroke-width="1.8"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" stroke="currentColor" stroke-width="1.8"/><path d="M3 12h18" stroke="currentColor" stroke-width="1.8"/></svg>
        @break

    @case('graduation-cap')
        <svg viewBox="0 0 24 24" fill="none"><path d="M12 3 2 8l10 5 10-5-10-5Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/><path d="M6 10.5V16c0 1.1 2.7 2.5 6 2.5s6-1.4 6-2.5v-5.5" stroke="currentColor" stroke-width="1.8"/><path d="M22 8v6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
        @break

    @case('code')
        <svg viewBox="0 0 24 24" fill="none"><path d="m9 8-4 4 4 4M15 8l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break

    @case('puzzle')
        <svg viewBox="0 0 24 24" fill="none"><path d="M9 4h3.5a1.5 1.5 0 0 1 1.4 2 1.5 1.5 0 0 0 1.6 1.5H19a1 1 0 0 1 1 1v3.5a1.5 1.5 0 0 1-2 1.4 1.5 1.5 0 0 0-2 1.6V19a1 1 0 0 1-1 1H11.5a1.5 1.5 0 0 1-1.4-2 1.5 1.5 0 0 0-1.6-1.5H5a1 1 0 0 1-1-1v-3.5a1.5 1.5 0 0 1 2-1.4 1.5 1.5 0 0 0 1.5-1.6V5a1 1 0 0 1 1-1Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
        @break

    @case('palette')
        <svg viewBox="0 0 24 24" fill="none"><path d="M12 3a9 9 0 1 0 0 18c1.1 0 2-.9 2-2 0-.5-.2-1-.5-1.3-.3-.4-.5-.8-.5-1.2 0-.9.7-1.5 1.5-1.5H16a4 4 0 0 0 4-4c0-4.4-3.6-8-8-8Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><circle cx="7.5" cy="10.5" r="1.2" fill="currentColor"/><circle cx="10.5" cy="7" r="1.2" fill="currentColor"/><circle cx="15" cy="7.5" r="1.2" fill="currentColor"/></svg>
        @break

    @case('lightbulb')
        <svg viewBox="0 0 24 24" fill="none"><path d="M9 18h6M10 21h4M12 3a5 5 0 0 0-3 9c.6.5 1 1.2 1 2v1h4v-1c0-.8.4-1.5 1-2a5 5 0 0 0-3-9Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break

    @case('target')
        <svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="1.6"/><circle cx="12" cy="12" r="1.5" fill="currentColor"/></svg>
        @break
@endswitch
