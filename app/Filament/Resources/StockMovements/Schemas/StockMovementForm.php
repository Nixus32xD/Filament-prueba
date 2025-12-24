<?php

namespace App\Filament\Resources\StockMovements\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class StockMovementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->label('Producto')
                    ->required()
                    ->relationship('product', 'name')
                    ->preload()
                    ->searchable(),
                Select::make('type')
                    ->options(['in' => 'In', 'out' => 'Out', 'adjust' => 'Adjust'])
                    ->required(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Textarea::make('reference')
                    ->columnSpanFull(),
                Select::make('user_id')
                    ->label('Nombre de Usuario')
                    ->required()
                    ->relationship('user', 'name')
                    ->preload()
                    ->searchable(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
