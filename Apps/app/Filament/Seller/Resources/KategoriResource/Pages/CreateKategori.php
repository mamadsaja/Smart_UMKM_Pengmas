<?php

namespace App\Filament\Seller\Resources\KategoriResource\Pages;

use App\Filament\Seller\Resources\KategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\UniqueConstraintViolationException;
use Filament\Notifications\Notification;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;

class CreateKategori extends CreateRecord
{
    protected static string $resource = KategoriResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        try {
            $model = static::getModel();
            $record = $model::create($data);
            return $record;
        } catch (UniqueConstraintViolationException $e) {
            // Add a debug statement to confirm this block is reached
            dd('Caught unique constraint violation');

            Notification::make()
                ->danger()
                ->title('Gagal membuat kategori')
                ->body('Nama kategori ini sudah terdaftar.')
                ->send();

            $this->halt();
            
        }
    }
}
