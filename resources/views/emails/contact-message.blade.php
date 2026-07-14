<x-mail::message>
# Nouveau message depuis le portfolio

**De :** {{ $senderName }} ({{ $senderEmail }})

**Sujet :** {{ $messageSubject }}

{{ $body }}

<x-mail::button :url="'mailto:'.$senderEmail">
Répondre à {{ $senderName }}
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
