<?php

namespace Ijpatricio\FilamentExcalidraw\Livewire;

use Filament\Widgets\Widget;

class ExcalidrawWidget extends Widget
{
    protected static string $view = 'filament-excalidraw::livewire.excalidraw-widget';

    protected int | string | array $columnSpan = 'full';
}
