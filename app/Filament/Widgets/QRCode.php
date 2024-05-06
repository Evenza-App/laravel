<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;

class QRCode extends Widget
{
    protected static ?int $sort = 6;

    protected static bool $isLazy = true;

    protected int | string | array $columnSpan = 'full';

    protected static string $view = 'filament.widgets.q-r-code';
}
