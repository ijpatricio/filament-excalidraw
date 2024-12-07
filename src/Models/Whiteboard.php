<?php

namespace Ijpatricio\FilamentExcalidraw\Models;

use Ijpatricio\FilamentExcalidraw\Enums\WhiteboardType;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Whiteboard extends Model
{
    use HasUuids;

    protected $table = 'laravel_whiteboards';

    protected $guarded = ['id'];

    protected $casts = [
        'data' => 'json',
        'type' => WhiteboardType::class,
    ];
}
