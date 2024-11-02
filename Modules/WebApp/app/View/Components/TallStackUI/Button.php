<?php

namespace Modules\WebApp\View\Components\TallStackUI;

use TallStackUi\View\Components\Button\Button as TallButton;

class Button extends TallButton
{
    public function backgroundColor(): array
    {
        return [
            'solid' => [
                'primary' => 'bg-primary-500 text-white border-none hover:bg-primary-600',
                'secondary' => 'bg-secondary-500 text-white border-none hover:bg-secondary-600',
                'light' => 'bg-white text-dark border-none hover:text-white hover:bg-primary-500',
                'dark' => 'bg-dark text-white border-none hover:bg-neutral-600',
                'danger' => 'bg-red-500 text-white border-none hover:bg-red-600',
                'success' => 'text-white bg-green-500 border-none hover:bg-green-600',
            ],
            'outline' => [
                'primary' => 'bg-transparent border-primary-500 text-primary hover:text-white hover:bg-primary-500 hover:border-primary-500',
            ],
        ];
    }
}
