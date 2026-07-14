# Portfolio V3

Site portfolio personnel de Sam Requena, développé avec Laravel et Livewire. Comprend un site public (accueil, à propos, projets) et un espace d'administration pour gérer le contenu.

## Stack technique

- PHP 8.3 / Laravel 13
- Livewire 4
- MySQL
- Vite, Sass
- Pest pour les tests

## Fonctionnalités

- **Site public** : page d'accueil, page à propos, liste et détail des projets
- **Formulaire de contact** : les messages sont toujours enregistrés en base, l'envoi d'email (Resend) est optionnel et ne bloque pas l'envoi si le mailer est indisponible
- **Espace admin** (`/admin`) : dashboard, gestion des projets, gestion des compétences, messages reçus, changement de mot de passe

## Installation

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Configurer la connexion MySQL dans `.env`, puis :

```bash
php artisan migrate --seed
npm run build   # ou npm run dev en développement
```

Un compte admin est créé par le seeder avec un mot de passe placeholder (voir `database/seeders/DatabaseSeeder.php`). Se connecter sur `/admin/login` puis changer immédiatement le mot de passe depuis `/admin/settings`.

## Mailer

Le formulaire de contact envoie ses emails via [Resend](https://resend.com). Après avoir vérifié le domaine d'envoi sur Resend, renseigner dans `.env` :

```
MAIL_MAILER=resend
RESEND_API_KEY=
```

## Tests

```bash
php artisan test
```
