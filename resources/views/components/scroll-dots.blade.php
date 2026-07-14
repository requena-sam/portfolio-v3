@props(['targets' => [
    'hero' => 'Accueil',
    'about' => 'À propos',
    'projects' => 'Projets',
    'avis' => 'Avis',
    'experience' => 'Expérience',
    'contact' => 'Contact',
]])

<div id="scroll-dots">
    @foreach ($targets as $target => $label)
        <div class="sd" data-target="{{ $target }}" data-label="{{ $label }}"></div>
    @endforeach
</div>
