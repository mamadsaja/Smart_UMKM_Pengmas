<?php

namespace App\Filament\Seller\Resources\BukuResource\Pages;

use App\Filament\Seller\Resources\BukuResource;
use App\Models\Buku;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBukus extends ListRecords
{
    protected static string $resource = BukuResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function mount(): void
    {
        parent::mount();
        StatsOverviewWidget::make([
            'Total Books' => Buku::count(),
            'Total Stock' => Buku::sum('stok'),
            'Average Price' => Buku::avg('harga'),
        ]);
    }
}
