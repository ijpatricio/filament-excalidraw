<?php

namespace Ijpatricio\FilamentExcalidraw\Livewire;

use App\Models\User;
use Ijpatricio\Mingle\Concerns\InteractsWithMingles;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\Renderless;
use Livewire\Component;

class ExcalidrawEditor extends Component
{
    use InteractsWithMingles;

    public $mingleId;

    public function mount()
    {
        $this->mingleId = 'mingle-' . Str::random();
    }

    public function component(): string
    {
        return 'Excalidraw/index.jsx';
    }

    public function mingleData(): Collection
    {
        return collect();
    }

    #[Renderless]
    public function countUsers()
    {
        dd('hereeee delete');
        return User::count();
    }

    public function render(): mixed
    {
        return view('filament-excalidraw::livewire.excalidraw-editor');
    }
}
