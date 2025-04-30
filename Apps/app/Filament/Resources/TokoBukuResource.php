<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokoBukuResource\Pages;
use App\Filament\Resources\TokoBukuResource\RelationManagers;
use App\Models\Seller;
use App\Models\TokoBuku;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
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
                Repeater::make('Link_Marketplace')
                    ->label('Link Marketplace')
                    ->schema([
                        TextInput::make('url')
                            ->label('URL Toko Online')
                            ->url()
                            ->placeholder('https://tokopedia.com/tokomu')
                            ->required(),
                    ])
                    ->columns(1)
                    ->addActionLabel('Tambah Link Toko')
                    ->minItems(1)
                    ->reorderable()
                    ->defaultItems(1),
                Select::make('Id_seller') 
                    ->label('Nama Seller')
                    ->options(Seller::pluck('Nama_Seller', 'id')) 
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $seller = Seller::find($state);
                        if ($seller) {
                            $set('Kontak', $seller->Kontak);
                            $set('Nama_Seller', $seller->Nama_Seller); 
                        }
                    })
                    ->required(),
                TextInput::make('Alamat'),
                TextInput::make('Kontak')
                    ->label('Kontak')
                    ->readOnly() 
                    ->required(),
                TextInput::make('Nama_Seller') // << ini biar ke-submit ke DB
                    ->hidden(),
                TextInput::make('deskripsi_toko')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextInputColumn::make('Nama_Toko')
                    ->disabled(),
                TextInputColumn::make('seller.Nama_Seller')
                    ->disabled(),
                TextInputColumn::make('Kontak')
                    ->disabled(),
                TextInputColumn::make('Alamat')
                    ->disabled(),
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
