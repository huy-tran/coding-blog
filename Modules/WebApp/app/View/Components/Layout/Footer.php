<?php

namespace Modules\WebApp\View\Components\Layout;

use Illuminate\View\Component;
use Illuminate\View\View;

class Footer extends Component
{
    public function render(): View|string
    {
        return view('webapp::components.layout.footer');
    }
}
