<?php

namespace Modules\WebApp\View\Components\TallStackUI;

use TallStackUi\View\Components\Alert as TallAlert;

class Alert extends TallAlert
{
    public function backgroundColor(): array
    {
        return [
            'light' => [
                'primary' => 'bg-primary-100 border-primary-200',
                'info' => 'bg-secondary-100 border-secondary-200',
                'warning' => 'bg-warning-100 border-warning-200',
            ],
        ];
    }

    public function textColor(): array
    {
        return [
            'light' => [
                'primary' => 'text-primary-900',
                'info' => 'text-secondary-900',
                'warning' => 'text-warning-900',
            ],
        ];
    }
}
