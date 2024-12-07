@php
    use Filament\Support\Facades\FilamentView;
    use Filament\Support\Facades\FilamentAsset;
@endphp

<div>
    <style>
        .excalidraw-modal .fi-modal-content {
            padding: 0;
        }
    </style>

    <x-filament::modal class="excalidraw-modal" id="edit-whiteboard-modal" width="screen">
        <livewire:excalidraw-editor />
    </x-filament::modal>
</div>
