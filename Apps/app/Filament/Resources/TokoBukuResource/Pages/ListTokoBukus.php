<?php

namespace App\Filament\Resources\TokoBukuResource\Pages;

use App\Filament\Resources\TokoBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTokoBukus extends ListRecords
{
    protected static string $resource = TokoBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
