<?php

namespace Ijpatricio\FilamentExcalidraw\Enums;

use Filament\Support\Contracts\HasLabel;

enum WhiteboardType: string implements HasLabel
{
    case Whiteboard = 'whiteboard';
    case Library = 'library';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Whiteboard => 'Whiteboard',
            self::Library => 'Library',
        };
    }
}
