<p align="center">
<img src="./art/logo-cover.png" style="width: 500px; border-radius: 12px; margin: 20px; box-shadow: 5px 5px 20px rgb(45 114 253);" >
</p>

<a href="https://github.com/ijpatricio/filament-excalidraw/actions"><img src="https://github.com/ijpatricio/filament-excalidraw/workflows/Tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/ijpatricio/filament-excalidraw"><img src="https://img.shields.io/packagist/dt/ijpatricio/filament-excalidraw" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/ijpatricio/filament-excalidraw"><img src="https://img.shields.io/packagist/v/ijpatricio/filament-excalidraw" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/ijpatricio/filament-excalidraw"><img src="https://img.shields.io/packagist/l/ijpatricio/filament-excalidraw" alt="License"></a>

# A whiteboard with Excalidraw, for Filament

A picture is worth a thousand words. Express yourself with shapes, diagrams, and pictures.

## Installation

You can install the package via composer:

```bash
composer require ijpatricio/filament-excalidraw
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-excalidraw-migrations"

php artisan migrate
```

## Usage

```php
// app/Providers/Filament/AdminPanelProvider.php

// ...
    ->resources([
        \Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource::class,
    ])
// ...
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Patricio](https://github.com/ijpatricio)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
