@props(['title' => 'Admin'])
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

<nav class="admin-nav">
    <a href="{{ route('home') }}" class="admin-nav-logo" aria-label="Retour au site">SR</a>

    <div class="admin-nav-links">
        <a href="{{ route('admin.dashboard') }}" wire:navigate class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('admin.projects.index') }}" wire:navigate class="admin-nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">Projets</a>
        <a href="{{ route('admin.skills.index') }}" wire:navigate class="admin-nav-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">Compétences</a>
        <a href="{{ route('admin.messages.index') }}" wire:navigate class="admin-nav-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">Messages</a>
        <a href="{{ route('admin.settings') }}" wire:navigate class="admin-nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">Paramètres</a>
    </div>

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit" class="admin-nav-logout">Déconnexion</button>
    </form>
</nav>

<main class="admin-page">
    <div class="w">
        {{ $slot }}
    </div>
</main>

@livewireScripts
</body>
</html>
