<?php

namespace Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource;

class EditWhiteboard extends EditRecord
{
    protected static string $resource = WhiteboardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
