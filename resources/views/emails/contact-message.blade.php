<x-mail::message>
# Nouveau message du portfolio

**{{ $senderName }}** ({{ $senderEmail }}) vous a écrit à propos de « {{ $messageSubject }} ».

<x-mail::panel>
{{ $body }}
</x-mail::panel>

<x-mail::button :url="'mailto:'.$senderEmail" color="primary">
Répondre à {{ $senderName }}
</x-mail::button>
</x-mail::message>
