<?php

namespace Ijpatricio\FilamentExcalidraw;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource;

class FilamentExcalidrawPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-excalidraw';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            WhiteboardResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
