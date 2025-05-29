<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TokoBukuResource\Pages;
use App\Filament\Resources\TokoBukuResource\RelationManagers;
use App\Models\Seller;
use App\Models\TokoBuku;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
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

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $navigationLabel = 'Manage Toko Buku';
    protected static ?string $navigationGroup = 'Manage';
    protected static ?string $navigationBadgeTooltip = 'The number of Toko Buku';


    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        Forms\Components\Section::make('Informasi Toko')
            ->description('Informasi dasar tentang toko buku Anda')
            ->icon('heroicon-o-information-circle')
            ->schema([
                TextInput::make('Nama_Toko')
                    ->required()
                    ->placeholder('Masukkan nama toko buku Anda')
                    ->maxLength(255),
                    
                Select::make('Id_seller')
                    ->label('Email Seller')
                    ->options(Seller::pluck('email', 'id'))
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function ($state, callable $set) {
                        $seller = Seller::find($state);
                        if ($seller) {
                            $set('Kontak', $seller->Kontak);
                            $set('email', $seller->email);
                        }
                    })
                    ->required(),

                TextInput::make('Alamat')
                    ->required()
                    ->placeholder('Masukkan alamat toko buku Anda')
                    ->maxLength(255),

                TextInput::make('Kontak')
                    ->label('Kontak')
                    ->readOnly()
                    ->required(),

                Hidden::make('name') 
                    ->required(),

                TextInput::make('deskripsi_toko')
                    ->label('Deskripsi Toko')
                    ->required()
                    ->placeholder('Jelaskan tentang toko buku Anda')
                    ->maxLength(1000)
                    ->columnSpanFull(),
            ])->columns(2),
            
        Forms\Components\Section::make('Input Link Marketplace')
            ->description('Masukkan link toko online Anda di berbagai marketplace')
            ->icon('heroicon-o-shopping-bag')
            ->collapsible()
            ->schema([
                TextInput::make('Toko_Shopee')
                    ->label('Link Shopee')
                    ->url()
                    ->placeholder('https://shopee.co.id/tokomu')
                    ->prefixIcon('heroicon-o-shopping-bag')
                    ->suffixAction(
                        Forms\Components\Actions\Action::make('visit')
                            ->icon('heroicon-m-arrow-top-right-on-square')
                            ->tooltip('Buka link')
                            ->url(fn (TextInput $component) => $component->getState(), true)
                            ->visible(fn (TextInput $component) => filled($component->getState()))
                    )
                    ->helperText('Masukkan link toko Shopee Anda'),

                TextInput::make('Toko_Tokopedia')
                    ->label('Link Tokopedia')
                    ->url()
                    ->placeholder('https://www.tokopedia.com/tokomu')
                    ->prefixIcon('heroicon-o-shopping-bag')
                    ->suffixAction(
                        Forms\Components\Actions\Action::make('visit')
                            ->icon('heroicon-m-arrow-top-right-on-square')
                            ->tooltip('Buka link')
                            ->url(fn (TextInput $component) => $component->getState(), true)
                            ->visible(fn (TextInput $component) => filled($component->getState()))
                    )
                    ->helperText('Masukkan link toko Tokopedia Anda'),
            ])->columnSpanFull(),

        Forms\Components\Section::make('Media Toko')
            ->description('Unggah gambar profil dan banner untuk toko Anda')
            ->icon('heroicon-o-photo')
            ->schema([
                FileUpload::make('gambar_toko')
                    ->label('Foto Profil')
                    ->image()
                    ->directory('gambar_toko')
                    ->required()
                    ->disk('public')
                    ->imagePreviewHeight('250')
                    ->panelAspectRatio('1:1')
                    ->panelLayout('integrated')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageEditor()
                    ->helperText('Upload gambar profil toko Anda (rasio 1:1)'),

                FileUpload::make('banner')
                    ->label('Banner')
                    ->image()
                    ->directory('banners')
                    ->required()
                    ->disk('public')
                    ->imagePreviewHeight('250')
                    ->panelAspectRatio('16:9')
                    ->panelLayout('integrated')
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageEditor()
                    ->helperText('Upload banner toko Anda (rasio 16:9)'),
            ])->columns(2),
        ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextInputColumn::make('Nama_Toko')
                    ->searchable()
                    ->disabled(),
                TextInputColumn::make('seller.name')
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
                Tables\Actions\DeleteAction::make(),
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

    public static function getNavigationBadge(): ?string
    {
        return (string) TokoBuku::count();
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Total Toko Buku yang terdaftar';
    }

    public static function mutateFormDataBeforeFill(array $data): array
    {
        // \log::info('Saving Data:', $data); // DEBUG

        $marketplaceData = $data['Marketplaces'] ?? [];
    
        $data['Nama_Marketplace'] = collect($marketplaceData)
            ->pluck('Nama_Marketplace')
            ->toArray();
    
        $data['Toko_Marketplace'] = collect($marketplaceData)
            ->pluck('Toko_Marketplace')
            ->toArray();
    
        unset($data['Marketplaces']);
    
        return $data;
    }


}
