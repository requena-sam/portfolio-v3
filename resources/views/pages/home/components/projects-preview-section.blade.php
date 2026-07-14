<section class="sec" id="projects">
    <div class="sec-glow right"></div>

    <x-decor.robot variant="boxy" id="projects-bot" class="sec-bot float-b" />

    <div class="w sec-inner-zoom">
        <x-section-heading
            num="02"
            :label="__('home.projects_preview.label')"
            :line1="__('home.projects_preview.title_line_1')"
            :line2="__('home.projects_preview.title_line_2')"
        />

        <div class="proj-list">
            @foreach ($featuredProjects as $i => $project)
                <x-projects::project-card
                    :project="$project"
                    context="home"
                    :reveal-class="$i === 0 ? 'reveal' : 'reveal reveal-delay-1'"
                />
            @endforeach
        </div>

        <div class="see-all-row reveal reveal-delay-2">
            <x-button variant="ghost" :href="route('projects')">
                {{ __('home.projects_preview.see_all', ['count' => $projectsCount]) }}
            </x-button>
        </div>
    </div>
</section>
