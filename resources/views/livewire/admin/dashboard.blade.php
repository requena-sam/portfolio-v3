<div>
    <div class="admin-page-head">
        <div>
            <p class="admin-eyebrow">Vue d'ensemble</p>
            <h1 class="admin-page-title">Dashboard</h1>
        </div>
    </div>

    <div class="admin-cards">
        <a href="{{ route('admin.projects.index') }}" wire:navigate class="admin-card">
            <div class="admin-card-count">{{ $projectCount }}</div>
            <div class="admin-card-label">Projets</div>
        </a>

        <a href="{{ route('admin.messages.index') }}" wire:navigate class="admin-card">
            <div class="admin-card-count">{{ $unreadMessageCount }}</div>
            <div class="admin-card-label">Messages non lus</div>
        </a>
    </div>
</div>
