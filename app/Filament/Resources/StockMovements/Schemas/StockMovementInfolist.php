<?php

namespace App\Filament\Resources\StockMovements\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class StockMovementInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('product.name')
                    ->label('Producto'),

                TextEntry::make('type')
                    ->badge(),
                TextEntry::make('quantity')
                    ->numeric(),
                TextEntry::make('reference')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('user.name')
                    ->label('Nombre de Usuario'),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
