<?php

namespace App\Filament\Resources\TokoBukuResource\Pages;

use App\Filament\Resources\TokoBukuResource;
use App\Models\Seller;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTokoBuku extends CreateRecord
{
    protected static string $resource = TokoBukuResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $seller = Seller::find($data['Id_seller']);
        if ($seller) {
            $data['name'] = $seller->name;
        }
        return $data;
    }
}
