<div class="reviews-slider" wire:poll.10000ms="next">
    <div class="reviews-track">
        @foreach ($reviews as $review)
            <figure class="review-card" wire:key="review-{{ $review['initials'] }}">
                <div class="review-stars" role="img" aria-label="{{ $review['stars'] }} étoiles sur 5">{{ str_repeat('★', $review['stars']) }}</div>
                <blockquote class="review-text">"{{ $review['text'] }}"</blockquote>
                <figcaption class="review-author">
                    <div class="review-avatar" aria-hidden="true">{{ $review['initials'] }}</div>
                    <div>
                        <strong class="review-name">{{ $review['name'] }}</strong>
                        <div class="review-role">{{ $review['role'] }}</div>
                    </div>
                </figcaption>
            </figure>
        @endforeach
    </div>

    <div class="reviews-controls">
        <button class="review-arrow" wire:click="previous" aria-label="{{ __('home.testimonials.prev_aria') }}">
            <svg viewBox="0 0 24 24" fill="none"><path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
        <div class="reviews-dots">
            @for ($i = 0; $i < $totalPages; $i++)
                <button
                    type="button"
                    class="review-dot {{ $i === $page ? 'active' : '' }}"
                    wire:click="goTo({{ $i }})"
                    aria-label="Page {{ $i + 1 }}"
                ></button>
            @endfor
        </div>
        <button class="review-arrow" wire:click="next" aria-label="{{ __('home.testimonials.next_aria') }}">
            <svg viewBox="0 0 24 24" fill="none"><path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </button>
    </div>
</div>
