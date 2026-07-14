<?php

namespace App\Providers;

use App\Models\Project;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();

        // <x-projects::project-card> is shared between the homepage preview
        // and the full projects list (app/Livewire/Projects/ProjectsFilter).
        Blade::anonymousComponentPath(
            resource_path('views/pages/projects/components'),
            'projects',
        );

        View::composer('pages.home.components.projects-preview-section', function ($view): void {
            $view->with([
                'featuredProjects' => Project::query()->where('featured', true)->orderBy('year', 'desc')->orderBy('order', 'desc')->orderBy('id', 'desc')->get(),
                'projectsCount' => Project::query()->count(),
            ]);
        });
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }
}
