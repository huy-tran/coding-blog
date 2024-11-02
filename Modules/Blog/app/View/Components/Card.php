<?php

namespace Modules\Blog\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;
use Statamic\Entries\Entry;

class Card extends Component
{
    public function __construct(
        public Entry $entry,
    ) {}

    public function render(): View|string
    {
        return view('blog::components.card');
    }
}
