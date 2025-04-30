<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokoBukuResource\Pages;
use App\Filament\Resources\TokoBukuResource\RelationManagers;
use App\Models\TokoBuku;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TokoBukuResource extends Resource
{
    protected static ?string $model = TokoBuku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('Nama_Toko'),
                TextInput::make('Marketpalce'),
                TextInput::make('Nama_Seller'),
                TextInput::make('Alamat'),
                TextInput::make('Kontak'),
                TextInput::make('deskripsi_toko')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTokoBukus::route('/'),
            'create' => Pages\CreateTokoBuku::route('/create'),
            'edit' => Pages\EditTokoBuku::route('/{record}/edit'),
        ];
    }
}
