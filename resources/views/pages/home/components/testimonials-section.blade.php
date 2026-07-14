<section class="sec" id="avis">
    <div class="sec-glow right"></div>

    <x-decor.robot variant="square-star" id="avis-bot" class="sec-bot float-a" />

    <div class="w sec-inner-zoom">
        <x-section-heading
            num="03"
            :label="__('home.testimonials.label')"
            :line1="__('home.testimonials.title_line_1')"
            :line2="__('home.testimonials.title_line_2')"
        />

        <div class="reveal reveal-delay-2">
            <livewire:home.reviews-slider />
        </div>
    </div>
</section>
