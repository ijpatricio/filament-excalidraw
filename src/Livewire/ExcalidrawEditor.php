<?php

namespace Ijpatricio\FilamentExcalidraw\Livewire;

use Ijpatricio\FilamentExcalidraw\Models\Whiteboard;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class ExcalidrawEditor extends Component
{
    public $mingleId;

    public ?string $whiteboardId = null;

    public function mount()
    {
        $this->mingleId = 'mingle-' . Str::random();
    }

    public function mingleData(): Collection
    {
        return collect();
    }

    #[On('boot-whiteboard-with')]
    public function bootWhiteboardWith($whiteboardId): void
    {
        $this->whiteboardId = $whiteboardId;

        $this->dispatch('open-modal', id: 'edit-whiteboard-modal');
    }

    #[Renderless]
    public function loadData()
    {
        try {
            $whiteboard = Whiteboard::findOrFail($this->whiteboardId);

            return $whiteboard->data;
        } catch (\Exception $e) {
            return false;
        }
    }

    #[Renderless]
    public function save($data)
    {
        $whiteboard = Whiteboard::find($this->whiteboardId);

        ray($data);

        try {
            $whiteboard->data = $data;
            $whiteboard->save();
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    public function render(): mixed
    {
        return view('filament-excalidraw::livewire.excalidraw-editor');
    }
}
