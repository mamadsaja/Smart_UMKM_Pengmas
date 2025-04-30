<?php

namespace App\Filament\Resources\TokoBukuResource\Pages;

use App\Filament\Resources\TokoBukuResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTokoBuku extends EditRecord
{
    protected static string $resource = TokoBukuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
