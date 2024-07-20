<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StarIcon extends Component
{
    public bool $filled;

    /**
     * Create a new component instance.
     *
     * @param bool $filled
     */
    public function __construct(bool $filled)
    {
        $this->filled = $filled;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.star-icon');
    }
}
