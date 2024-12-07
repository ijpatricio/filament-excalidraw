@php
    use Filament\Support\Facades\FilamentView;
    use Filament\Support\Facades\FilamentAsset;
@endphp

<div
    ax-load-css="{{ FilamentAsset::getStyleHref('filament-excalidraw-styles', package: 'ijpatricio/filament-excalidraw') }}"
    ax-load-src="{{ FilamentAsset::getScriptSrc('filament-excalidraw-scripts', package: 'ijpatricio/filament-excalidraw') }}"
>
    <style>
        .fi-modal-content {
            padding: 0;
        }
    </style>

    <x-filament::modal
        class="excalidraw-modal"
        id="edit-whiteboard-modal"
        width="screen"
        displayClasses="inline-block"
    >
        <livewire:excalidraw-editor />
    </x-filament::modal>
</div>
