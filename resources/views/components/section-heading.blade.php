@props([
    'num' => '01',
    'label' => '',
    'line1' => '',
    'line2' => null,
])

<span class="sec-num">{{ $num }}</span>
<p class="sec-lbl reveal">{{ $label }}</p>
<h2 class="sec-ttl reveal reveal-delay-1">{{ $line1 }}@if ($line2)<br><span class="dim">{{ $line2 }}</span>@endif</h2>
