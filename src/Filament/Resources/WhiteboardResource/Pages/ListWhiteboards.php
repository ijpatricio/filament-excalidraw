<?php

namespace Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Ijpatricio\FilamentExcalidraw\Livewire\ExcalidrawWidget;
use Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource;
use Illuminate\Foundation\Vite;
use Illuminate\Support\HtmlString;

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

    public function mount(): void
    {
        /* Playground Vite (Faster vs package Esbuild commands)  */
        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_END,
            fn() => app(Vite::class)('resources/js/dev-excalidraw.js'),
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_END,
            fn() => new HtmlString("
                <script>
                    setTimeout(() => {
                        document.querySelector('tbody div > div > button > span').click()
                    }, 1200)
                </script>
            ")
        );
    }
}
