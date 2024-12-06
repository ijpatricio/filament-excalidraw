<?php

namespace Ijpatricio\FilamentExcalidraw\Commands;

use Illuminate\Console\Command;

class FilamentExcalidrawCommand extends Command
{
    public $signature = 'filament-excalidraw';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
