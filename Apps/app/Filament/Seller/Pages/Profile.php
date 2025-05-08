<?php

namespace App\Filament\Seller\Pages;

use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;
use Filament\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string $view = 'filament.seller.pages.profile';
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profile';
    protected static ?string $title = 'Profile';
    protected static ?string $slug = 'profile';

    public ?array $data = [];

    public function mount(): void
    {
        $seller = Auth::guard('seller')->user();

        if (!$seller) {
            abort(403, 'Unauthorized');
        }

        $this->form->fill([
            'name' => $seller->name,
            'email' => $seller->email,
            'Kontak' => $seller->Kontak,
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama')
                    ->maxLength(255)
                    ->required(),

                TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                TextInput::make('password')
                    ->password()
                    ->label('Password Baru')
                    ->placeholder('Kosongkan jika tidak mengubah')
                    ->minLength(8)
                    ->dehydrated(fn($state) => filled($state)),

                TextInput::make('Kontak')
                    ->label('Kontak')
                    ->maxLength(15)
                    ->tel()
                    ->required(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $seller = Auth::guard('seller')->user();

        if (!$seller) {
            Notification::make()
                ->title('Gagal menyimpan')
                ->body('Anda tidak memiliki akses')
                ->danger()
                ->send();
            return;
        }

        $data = $this->form->getState();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $seller->update($data);

        Notification::make()
            ->title('Profil diperbarui')
            ->success()
            ->send();
    }


    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Perubahan')
                ->action('save')
                ->color('primary'),
        ];
    }
}
