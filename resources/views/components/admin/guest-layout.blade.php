@props(['title' => 'Connexion'])
<!DOCTYPE html>
<html lang="fr" data-no-progress-bar>
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ $title }} — Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=JetBrains+Mono:wght@400;500;600;700&display=swap" rel="stylesheet" />
@vite(['resources/sass/admin.scss'])
@livewireStyles
</head>
<body>
<div id="admin-grid-bg"></div>
<div id="admin-glow"></div>

<div class="admin-guest-shell">
    <div class="admin-guest-card">
        {{ $slot }}
    </div>
</div>

@livewireScripts
</body>
</html>
