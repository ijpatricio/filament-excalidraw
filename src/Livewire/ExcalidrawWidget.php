<?php

namespace Ijpatricio\FilamentExcalidraw\Livewire;

use Filament\Widgets\Widget;
use Ijpatricio\FilamentExcalidraw\Models\Whiteboard;
use Livewire\Attributes\On;

class ExcalidrawWidget extends Widget
{
    protected static string $view = 'filament-excalidraw::livewire.excalidraw-widget';

    protected int | string | array $columnSpan = 'full';

    public ?Whiteboard $whiteboard = null;

    #[On('boot-whiteboard-with')]
    public function bootWhiteboardWith($whiteboard_id): void
    {
        if ($this->whiteboard?->id !== $whiteboard_id) {
            $this->whiteboard = Whiteboard::find($whiteboard_id);
        }

        $this->dispatch('open-modal', id: 'edit-whiteboard-modal');
    }

    public function load()
    {
        dd('heeere');

        //        return $this->whiteboard?->data;

        return Whiteboard::first()->data;
    }

    public function store($data)
    {
        $this->whiteboard->update(['data' => $data]);
    }
}
