<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('sku')
                    ->label('SKU')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),
                TextInput::make('cost')
                    ->required()
                    ->numeric()
                    ->default(0.0)
                    ->prefix('$'),
                TextInput::make('stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('min_stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('category_id')
                    ->required()
                    ->label('Categoría')
                    ->relationship('category', 'name')
                    ->preload()
                    ->searchable()
                    ,
                Select::make('supplier_id')
                    ->required()
                    ->label('Proveedor')
                    ->relationship('supplier', 'name')
                    ->preload()
                    ->searchable(),
            ]);
    }
}
