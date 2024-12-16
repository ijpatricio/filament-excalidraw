<?php

namespace Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource;
use Ijpatricio\FilamentExcalidraw\Livewire\ExcalidrawWidget;
use Ijpatricio\FilamentExcalidraw\Models\Whiteboard;
use Illuminate\Foundation\Vite;

class EditWhiteboard extends EditRecord
{
    protected static string $resource = WhiteboardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Open Whiteboard')
                ->icon('heroicon-o-document')
                ->action(function (Whiteboard $record, $livewire) {
                    $livewire->dispatch('boot-whiteboard-with', whiteboardId: $record->getKey());
                }),
            Actions\DeleteAction::make()
                ->outlined(),
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            ExcalidrawWidget::class,
        ];
    }
}
