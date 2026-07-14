<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Seed the application's projects.
     */
    public function run(): void
    {
        $skill = fn (string $name) => Skill::query()->where('name', $name)->value('id');

        $projects = [
            [
                'slug' => 'sef-site-vitrine',
                'name' => 'SEF | Service d\'entraide familiale site vitrine',
                'icon' => '🚀',
                'logo_url' => 'https://sefasbl.com/wp-content/uploads/2024/12/logosef-2048x1068.png',
                'type' => 'Site Vitrine',
                'year' => 2025,
                'featured' => false,
                'summary' => null,
                'description' => "Projet réalisé de manière indépendante durant mes études pour le Service d'Entraide Familiale (SEF), une ASBL qui accompagne les personnes sans domicile fixe dans leur réinsertion.\n\nCe projet fait partie de mes débuts en tant que développeur. Il m'a permis d'acquérir de solides bases, aussi bien en développement que dans la gestion d'un client et d'un projet. C'est une étape importante de mon parcours, qui explique naturellement sa place dans ce portfolio.",
                'stack' => [$skill('HTML'), $skill('SCSS'), $skill('WordPress'), $skill('JavaScript')],
                'images' => [
                    ['url' => 'https://i.ibb.co/zTnYqNVR/1920x1080.jpg', 'alt' => 'Mockup du site internet', 'main' => true],
                ],
                'link' => 'https://sefasbl.com/',
                'github_link' => 'https://github.com/requena-sam/sef/tree/dev',
            ],
            [
                'slug' => 'groupe-vhc',
                'name' => 'Groupe VHC',
                'icon' => '🏢',
                'logo_url' => 'https://www.groupvhc.be/assets/da033931-536a-4703-8a79-7ddc0edb2dfc/vhc-contact.png',
                'type' => 'Site Vitrine',
                'year' => 2026,
                'featured' => false,
                'summary' => null,
                'description' => "Landing page réalisée durant mon stage chez Synchrone pour Groupe VHC. La mission consistait à analyser en profondeur l'identité graphique existante du site du client, puis à retravailler cette direction artistique pour la moderniser, tout en restant fidèle aux codes visuels déjà en place.\n\nLe site a été intégré sur un CMS interne à l'entreprise, que j'ai combiné avec du SCSS et du JavaScript. Ce projet m'a permis de travailler avec un outil propriétaire et de m'adapter aux contraintes techniques et graphiques imposées par un existant, plutôt que de partir d'une page blanche.",
                'stack' => [$skill('CMS Custom'), $skill('JavaScript'), $skill('SCSS')],
                'images' => [
                    ['url' => 'https://i.ibb.co/WvH5YC2T/groupe-vhc.jpg', 'alt' => 'Landing page Groupe VHC', 'main' => true],
                ],
                'link' => null,
                'github_link' => null,
            ],
            [
                'slug' => 'easymates',
                'name' => 'Easymates',
                'icon' => '🎮',
                'logo_url' => asset('images/logos/easymates.svg'),
                'type' => 'Web App',
                'year' => 2026,
                'featured' => true,
                'summary' => null,
                'description' => "Easymates est une application web développée durant mes études, pensée comme un espace central pour les fans d'une structure Esport. Elle réunit plusieurs besoins de la communauté au même endroit, comme le partage de créations (fan art et autres contenus), la mise en relation entre fans pour organiser des co-hébergements et des co-voiturages afin de se déplacer vers les grands événements de la scène (majors, LAN, etc.), ainsi que le suivi en direct du statut Twitch des joueurs de la structure pour savoir s'ils sont en live.\n\nChaque utilisateur dispose d'un compte personnalisable avec un système de joueurs favoris et un dashboard qui centralise ses créations, ses trajets et les streams suivis. Côté back-office, j'ai construit un espace d'administration complet permettant de modérer le contenu publié par la communauté, de traiter les signalements des utilisateurs et de suivre l'activité de la plateforme via un système de logs.\n\nCe projet m'a permis d'aller plus loin dans l'écosystème Laravel, en combinant Livewire et Alpine.js pour construire une application réactive, tout en travaillant sur des problématiques concrètes de gestion communautaire, comme les rôles et permissions, la modération de contenu et l'intégration d'API tierces.",
                'stack' => [$skill('Laravel'), $skill('Livewire'), $skill('Alpine.js')],
                'color_palette' => ['#FAE445'],
                'images' => [
                    ['url' => 'https://i.ibb.co/TBPzphSm/easymates.jpg', 'alt' => 'Page principale d\'Easymates', 'main' => true],
                    ['url' => 'https://i.ibb.co/whP9NKb3/easymates-creations.jpg', 'alt' => 'Créations partagées par les fans', 'main' => false],
                    ['url' => 'https://i.ibb.co/DPgHrdNt/posts.jpg', 'alt' => 'Publications de la communauté', 'main' => false],
                ],
                'link' => null,
                'github_link' => 'https://github.com/requena-sam/easymates/tree/dev',
            ],
            [
                'slug' => 'amorce',
                'name' => 'L\'Amorce',
                'icon' => '🏦',
                'logo_url' => 'https://i.ibb.co/5hjQmDbt/amorce.png',
                'type' => 'Web App',
                'year' => 2025,
                'featured' => true,
                'summary' => null,
                'description' => "L'Amorce est une application web développée durant mes études pour une ASBL qui redistribue des fonds à une association partenaire. Des donateurs alimentent des fonds spécifiques gérés par L'Amorce, et l'argent collecté est ensuite reversé à l'association partenaire.\n\nLa particularité du projet réside dans sa gouvernance. Les décisions de redistribution sont prises par un conseil de donateurs, tiré au sort parmi les personnes ayant fait un don au cours des 3 derniers mois. L'application automatise ce tirage au sort et donne accès aux membres du conseil à un espace de gestion financière dédié.\n\nJ'ai mis en place un système de rôles et de permissions pour contrôler précisément qui peut consulter les finances, valider une redistribution ou administrer la plateforme, selon le rôle de chaque utilisateur (donateur, membre du conseil, administrateur).\n\nCe projet m'a permis de travailler sur une logique métier spécifique, le tirage au sort pondéré par une fenêtre glissante de 3 mois, ainsi que sur la conception d'un système de rôles robuste avec Laravel, Livewire, Alpine.js et Tailwind CSS.",
                'stack' => [$skill('Laravel'), $skill('Livewire'), $skill('Alpine.js'), $skill('Tailwind CSS')],
                'images' => [
                    ['url' => 'https://i.ibb.co/h1s112mW/amorce-2.jpg', 'alt' => 'Aperçu de L\'Amorce', 'main' => false],
                    ['url' => 'https://i.ibb.co/ksBf4c3J/amorce-finances.jpg', 'alt' => 'Gestion des finances', 'main' => true],
                    ['url' => 'https://i.ibb.co/YF16sLwF/amorces.jpg', 'alt' => 'Aperçu de L\'Amorce', 'main' => false],
                ],
                'link' => null,
                'github_link' => null,
            ],
            [
                'slug' => 'portfolio-v1',
                'name' => 'Portfolio V1',
                'icon' => '💻',
                'type' => 'Site Vitrine',
                'year' => 2024,
                'featured' => false,
                'summary' => null,
                'description' => "Portfolio V1 est mon tout premier projet web, et je tiens à le présenter tel quel, comme mes débuts. L'objectif était de créer un site qui me représentait pendant mon apprentissage, un point de départ qui m'a permis de découvrir concrètement le monde du développement web.\n\nJ'ai choisi de le réaliser avec WordPress afin de me familiariser avec la simulation d'un vrai projet client, avec la mise en place d'une gestion de contenu simple via une interface d'administration, et de premières bases en HTML, SCSS et JavaScript.\n\nC'est un projet volontairement simple, mais c'est celui qui m'a donné le goût du web et posé les fondations sur lesquelles j'ai continué à progresser depuis.",
                'stack' => [$skill('WordPress'), $skill('SCSS'), $skill('JavaScript'), $skill('HTML')],
                'images' => [
                    ['url' => 'https://i.ibb.co/fY45G0D6/portfolio-v1.jpg', 'alt' => 'Portfolio V1', 'main' => true],
                ],
                'link' => null,
                'github_link' => 'https://github.com/requena-sam/Portfolio-v1/tree/dev',
            ],
            [
                'slug' => 'semainy',
                'name' => 'Semainy',
                'icon' => '🎨',
                'type' => 'Mobile App',
                'year' => 2025,
                'featured' => false,
                'summary' => null,
                'description' => "Weekly est une application mobile développée avec Flutter, pensée pour réunir des créatifs autour d'un concours de design organisé chaque semaine. Chaque participant propose sa création sur le thème en cours, puis la communauté vote pendant le week-end pour élire la meilleure. Le gagnant du concours devient responsable du thème suivant, ce qui laisse la communauté faire évoluer l'application par elle-même.\n\nPour la gestion des visuels, j'ai intégré le service tiers ImgBB, qui permet de déposer les créations directement sur leurs serveurs. J'ai mis en place la communication avec leur API pour automatiser l'envoi, la récupération et l'affichage des images au sein de l'application.",
                'stack' => [$skill('Flutter')],
                'images' => [
                    ['url' => 'https://i.ibb.co/twrkSFkv/weekly.jpg', 'alt' => 'Aperçu de Weekly', 'main' => true],
                ],
                'link' => null,
                'github_link' => 'https://github.com/requena-sam/Semainy',
            ],
        ];

        foreach ($projects as $order => $project) {
            Project::query()->updateOrCreate(
                ['slug' => $project['slug']],
                [...$project, 'order' => $order],
            );
        }
    }
}
