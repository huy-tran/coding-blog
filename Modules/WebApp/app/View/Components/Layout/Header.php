<?php

namespace Modules\WebApp\View\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    public function render(): View|string
    {
        return view('webapp::components.layout.header');
    }
}
