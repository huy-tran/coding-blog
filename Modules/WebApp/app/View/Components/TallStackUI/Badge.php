<?php

namespace Modules\WebApp\View\Components\TallStackUI;

use TallStackUi\View\Components\Badge as TallBadge;

class Badge extends TallBadge
{
    public function backgroundColor(): array
    {
        return [
            'outline' => [
                'light' => '',
            ],
        ];
    }

    public function textColor(): array
    {
        return [
            'outline' => [
                'light' => '',
            ],
        ];
    }
}
