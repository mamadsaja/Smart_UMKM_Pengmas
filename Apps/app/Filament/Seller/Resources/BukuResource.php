<?php
namespace App\Filament\Seller\Resources;

use App\Models\Buku;
use App\Filament\Seller\Resources\BukuResource\Pages;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Seller;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Tables;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\StatsOverviewWidget;


class BukuResource extends Resource
{
    protected static ?string $model = Buku::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Manage Buku';
    protected static ?string $navigationGroup = 'Manage';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationBadgeTooltip = 'The number of Buku';

    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Books', Buku::count())
                ->description('Total number of books available.')
                ->color('primary'),
            Stat::make('Total Stock', Buku::sum('stok'))
                ->description('Total available stock.')
                ->color('secondary'),
            Stat::make('Average Price', Buku::avg('harga'))
                ->description('Average price of books.')
                ->color('success'),
        ];
    }

    protected static string $resource = BukuResource::class;

    public function mount(): void
    {
        parent::mount();
        StatsOverviewWidget::make([
            'Total Books' => Buku::count(),
            'Total Stock' => Buku::sum('stok'),
            'Average Price' => Buku::avg('harga'),
        ]);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('judul')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('penulis')
                        ->label('Penulis')
                        ->placeholder('Masukkan nama penulis'),

                    Forms\Components\Select::make('penerbit')
                        ->label('Penerbit')
                        ->options(function () {
                            return \App\Models\Buku::whereNotNull('penerbit')
                                ->pluck('penerbit', 'penerbit')
                                ->filter(function ($value) {
                                    return !empty($value);
                                })
                                ->unique()
                                ->toArray();
                        })
                        ->searchable(),

                    Forms\Components\TextInput::make('penerbit')
                        ->label('Penerbit Baru (Jika Tidak Ada)')
                        ->required(false)
                        ->placeholder('Masukkan nama penerbit baru')
                        ->afterStateUpdated(function ($state, callable $set) {
                            if ($state) {
                                $set('penerbit_temp', $state);
                            }
                        }),

                    Forms\Components\TextInput::make('tahun_terbit')
                        ->required()
                        ->numeric()
                        ->minValue(0)
                        ->maxLength(6),
                    Forms\Components\TextInput::make('harga')
                        ->required()
                        ->minValue(0)
                        ->numeric(),
                    Forms\Components\Textarea::make('deskripsi')
                        ->required(),
                    Forms\Components\TextInput::make('stok')
                        ->required()
                        ->minValue(0)
                        ->numeric(),
                    Forms\Components\FileUpload::make('gambar')
                        ->required(),
                    Forms\Components\Select::make('kategori_ids')
                        ->label('Kategori')
                        ->multiple()
                        ->options(\App\Models\Kategori::all()->pluck('namaKategori', 'id'))
                        ->preload()
                        ->searchable()
                        ->required()
                        ->saveRelationshipsUsing(function ($record, $state) {
                            $record->kategoris()->sync($state);
                        }),
                ])->columns(2)->heading('Informasi Buku'),

                // Card baru untuk link marketplace
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('Link_Marketplace')
                        ->label('Link Marketplace')
                        ->placeholder('https://www.marketplace.com/product/123')
                        ->url()
                        ->nullable() // Membuat field menjadi opsional
                        ->suffixAction(
                            Forms\Components\Actions\Action::make('openMarketplace')
                                ->icon('heroicon-o-shopping-bag')
                                ->url(fn ($state) => $state, shouldOpenInNewTab: true)
                        ),
                    
                    Forms\Components\TextInput::make('Link_Shopee')
                        ->label('Link Shopee')
                        ->placeholder('https://shopee.co.id/product/123')
                        ->url()
                        ->nullable() // Membuat field menjadi opsional
                        ->suffixAction(
                            Forms\Components\Actions\Action::make('openShopee')
                                ->icon('heroicon-o-shopping-bag')
                                ->url(fn ($state) => $state, shouldOpenInNewTab: true)
                        ),
                    
                    Forms\Components\TextInput::make('Link_Tokopedia')
                        ->label('Link Tokopedia')
                        ->placeholder('https://www.tokopedia.com/product/123')
                        ->url()
                        ->nullable() // Membuat field menjadi opsional
                        ->suffixAction(
                            Forms\Components\Actions\Action::make('openTokopedia')
                                ->icon('heroicon-o-shopping-bag')
                                ->url(fn ($state) => $state, shouldOpenInNewTab: true)
                        ),
                ])->columns(1)->heading('Link Marketplace'),
            ]);
    }

    public static function saved($record)
    {
        if ($record->penulis_temp) {
            $penulis = Penulis::firstOrCreate(['nama' => $record->penulis_temp]);
            $record->penulis_id = $penulis->id;
        }

        if ($record->penerbit_temp) {
            $penerbit = Penerbit::firstOrCreate(['nama' => $record->penerbit_temp]);
            $record->penerbit_id = $penerbit->id;
        }

        if ($record->kategoris) {
            $record->kategoris()->sync($record->kategoris);
        }

        $record->save();
    }


    public static function table(Table $table): Table
    {
        return $table
            ->query(Buku::where('toko_buku_id', auth()->user()->tokoBuku->id))
            ->columns([
                Tables\Columns\TextColumn::make('gambar')
                    ->formatStateUsing(function ($state) {
                        return $state ? '<img src="' . asset('storage/' . $state) . '" width="80" height="80" />' : 'No image';
                    })
                    ->html()
                    ->sortable()
                    ->searchable(),
                TextColumn::make('judul')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('penulis')
                    ->sortable()->searchable(),
                TextColumn::make('penerbit')
                    ->sortable()->searchable(),
                TextColumn::make('kategori')
                    ->label('Kategori')
                    ->formatStateUsing(function ($state, $record) {
                        return $record->kategoris->pluck('namaKategori')->implode(', ');
                    })
                    ->sortable()
                    ->searchable(),
                TextColumn::make('harga')
                    ->sortable()
                    ->searchable()
                    ->money(),
            ])
            ->filters([
                // Filters here
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        if (auth()->check() && auth()->user()->tokoBuku) {
            return (string) Buku::where('toko_buku_id', auth()->user()->tokoBuku->id)->count();
        }

        return '0';
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Total Buku yang terdaftar';
    }

    public function update(Seller $seller, Buku $buku): bool
    {
        $tokoBuku = optional($buku->tokoBuku);  // Menggunakan optional untuk menghindari error jika null
        return $tokoBuku->Id_seller === $seller->id;
    }

}
