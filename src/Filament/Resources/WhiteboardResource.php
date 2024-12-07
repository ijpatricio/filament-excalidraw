<?php

namespace Ijpatricio\FilamentExcalidraw\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Ijpatricio\FilamentExcalidraw\Enums\WhiteboardType;
use Ijpatricio\FilamentExcalidraw\Livewire\ExcalidrawWidget;
use Ijpatricio\FilamentExcalidraw\Models\Whiteboard;
use Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource\Pages\CreateWhiteboard;
use Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource\Pages\EditWhiteboard;
use Ijpatricio\FilamentExcalidraw\Filament\Resources\WhiteboardResource\Pages\ListWhiteboards;

class WhiteboardResource extends Resource
{
    protected static ?string $model = Whiteboard::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                Select::make('type')
                    ->options(WhiteboardType::class),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Edit Whiteboard')
                    ->icon('heroicon-o-document')
                    ->action(function (Whiteboard $record, $livewire) {
                        $livewire->dispatch('boot-whiteboard-with', whiteboardId: $record->getKey());
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getWidgets(): array
    {
        return [
            ExcalidrawWidget::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWhiteboards::route('/'),
            'create' => CreateWhiteboard::route('/create'),
            'edit' => EditWhiteboard::route('/{record}/edit'),
        ];
    }
}
