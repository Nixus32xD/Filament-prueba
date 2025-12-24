<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use Carbon\Carbon;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class CardsWidgets extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $chartData = collect(range(6, 0))
            ->map(function ($day) {
                $date = Carbon::today()->subDays($day);
                return Category::whereDate('created_at', $date)->count();
            })
            ->toArray();



        return [
            // //Forma Basica
            // Stat::make('Categorias', Category::query()->count()),
            // Stat::make('Productos', Product::query()->count()),
            // Stat::make('Proveedores', Supplier::query()->count()),

            Stat::make('Categorias', Category::query()->count())
                ->description('Total de categorias registradas')
                ->descriptionIcon('heroicon-m-tag', IconPosition::Before)
                ->chart($chartData)
                ->color('primary'),

            Stat::make('Productos', Product::query()->count())
                ->description('Total de productos disponibles')
                ->descriptionIcon('heroicon-m-cube', IconPosition::Before)
                ->chart([10, 25, 15, 30, 3, 20, 2])
                ->color('info'),

            Stat::make('Proveedores', Supplier::query()->count())
                ->description('Total de proveedores activos')
                ->descriptionIcon('heroicon-m-truck', IconPosition::Before)
                ->chart([5, 15, 8, 12, 6, 10, 4])
                ->color('success'),
        ];
    }
}
