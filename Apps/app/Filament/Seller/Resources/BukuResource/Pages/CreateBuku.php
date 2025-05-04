<?php

namespace App\Filament\Seller\Resources\BukuResource\Pages;

use App\Filament\Seller\Resources\BukuResource;
use App\Models\TokoBuku;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateBuku extends CreateRecord
{
    protected static string $resource = BukuResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $sellerId = auth()->id();
        $toko = TokoBuku::where('Id_seller', $sellerId)->first();

        if (!$toko) {
            abort(403, 'Lu belum punya toko, bang. Bikin dulu dong di halaman Toko Buku.');
        }

        $data['toko_buku_id'] = $toko->id;

        return $data;
    }

}
