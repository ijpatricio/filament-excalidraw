@php
    use Filament\Support\Facades\FilamentView;
    use Filament\Support\Facades\FilamentAsset;
@endphp


<div
{{-- Playground Vite (Faster vs package Esbuild commands) --}}
{{--    ax-load-css="{{ FilamentAsset::getStyleHref('filament-excalidraw-styles', package: 'ijpatricio/filament-excalidraw') }}"--}}
{{--    ax-load-src="{{ FilamentAsset::getScriptSrc('filament-excalidraw-scripts', package: 'ijpatricio/filament-excalidraw') }}"--}}
    x-init="
        window.Mingle.Elements = window.Mingle.Elements || {}
        window.Mingle.Elements['Excalidraw']
            .boot(
                '{{ $this->mingleId }}',
                '{{ $_instance->getId() }}',
            )
    "
>
    <div id="{{ $this->mingleId }}-container" wire:ignore x-ignore>
        <div
            id="{{ $this->mingleId }}"
            data-mingle-data="{{ json_encode($this->mingleData()) }}"
        ></div>
    </div>
</div>
