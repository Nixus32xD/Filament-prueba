<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class ChartPieWidget extends ChartWidget
{
    protected ?string $heading = 'Categorias de Productos';
    protected ?string $height = '500px';

    protected function getData(): array
    {
        $categories = Category::withCount('products')->get();
        $data = $categories->pluck('products_count')->toArray();
        $labels = $categories->pluck('name')->toArray();
        return [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Productos por Categoría',
                    'data' => $data,
                    'backgroundColor' => [
                        "#FF5733",
                        "#33FF57",
                        "#3357FF",
                        "#F1C40F",
                        "#9B59B6",
                        "#1ABC9C",
                        "#E74C3C",
                        "#2ECC71",
                        "#3498DB",
                        "#E67E22",
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'plugins' => [
                'legend' => [
                    'position' => 'right',
                ],
            ],
        ];
    }
}
