<?php

namespace Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Ijpatricio\FilamentExcalidraw\Livewire\ExcalidrawWidget;
use Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource;

class ListWhiteboards extends ListRecords
{
    protected static string $resource = WhiteboardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            ExcalidrawWidget::class,
        ];
    }
}
