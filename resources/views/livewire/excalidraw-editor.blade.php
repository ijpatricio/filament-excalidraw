@php
    use Filament\Support\Facades\FilamentView;
    use Filament\Support\Facades\FilamentAsset;
@endphp

{{--@push(config('mingle.stack'))--}}
{{--    @vite($this->component())--}}
{{--@endpush--}}

{{-- This is the container for the Mingle component.                                     --}}
{{-- It's an Alpine component, because this it becomes seamless to hook into Livewire's --}}
{{-- event lifecycle hooks, including some that would need PR atm (wire:navigate)       --}}
<div
    ax-load-css="{{ FilamentAsset::getStyleHref('filament-excalidraw-styles', package: 'ijpatricio/filament-excalidraw') }}"
    ax-load-src="{{ FilamentAsset::getScriptSrc('filament-excalidraw-scripts', package: 'ijpatricio/filament-excalidraw') }}"
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
