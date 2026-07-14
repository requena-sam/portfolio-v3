<?php

namespace App\Livewire\Home;

use Livewire\Component;

class ReviewsSlider extends Component
{
    public int $page = 0;

    private int $perPage = 2;

    public function next(): void
    {
        $this->goTo($this->page + 1);
    }

    public function previous(): void
    {
        $this->goTo($this->page - 1);
    }

    public function goTo(int $page): void
    {
        $pages = $this->totalPages();
        $this->page = (($page % $pages) + $pages) % $pages;
    }

    public function totalPages(): int
    {
        return (int) ceil(count(__('reviews.items')) / $this->perPage);
    }

    public function render()
    {
        $items = __('reviews.items');

        return view('livewire.home.reviews-slider', [
            'reviews' => array_slice($items, $this->page * $this->perPage, $this->perPage),
            'totalPages' => $this->totalPages(),
        ]);
    }
}
