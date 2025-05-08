<?php
namespace App\Filament\Seller\Resources;

use App\Models\Buku;
use App\Filament\Seller\Resources\BukuResource\Pages;
use Filament\Forms;
use Filament\Tables;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Form;
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

    // Menambahkan Stats Overview Widget
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
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penulis')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('penerbit')
                    ->required()
                    ->maxLength(255),
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
                Forms\Components\TextInput::make('kategori')
                    ->required()
                    ->maxLength(255),
            ]);
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
                Tables\Columns\TextColumn::make('judul')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('penulis')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kategori')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('stok')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('harga')
                    ->sortable()
                    ->searchable()
                    ->money(),
            ])
            ->filters([
                // Filters here
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

    // Menghubungkan dengan halaman
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBukus::route('/'),
            'create' => Pages\CreateBuku::route('/create'),
            'edit' => Pages\EditBuku::route('/{record}/edit'),
        ];
    }

    // Badge yang menunjukkan jumlah buku yang terdaftar
    public static function getNavigationBadge(): ?string
    {
        return (string) Buku::where('toko_buku_id', auth()->user()->tokoBuku->id)->count();
    }

    // Tooltip untuk badge
    public static function getNavigationBadgeTooltip(): ?string
    {
        return 'Total Buku yang terdaftar';
    }
}
