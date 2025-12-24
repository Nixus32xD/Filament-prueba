<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Support\RawJs;
use Filament\Widgets\ChartWidget;

class ChartBarWidget extends ChartWidget
{
    protected ?string $heading = 'Top 10 con Mayor Stock';
    protected ?string $height = '500px';

    protected function getData(): array
    {
        $topProducts =Product::orderBy('stock', 'desc')
            ->take(10)
            ->get();
        return [
            'labels' => $topProducts->pluck('name')->toArray(),
            'datasets' => [
                [
                    'label' => 'Stock Actual',
                    'data' => $topProducts->pluck('stock')->toArray(),
                    'backgroundColor' => '#673AB7',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
                ],

            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
}
