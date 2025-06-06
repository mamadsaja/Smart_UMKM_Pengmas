<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Seller extends Authenticatable implements FilamentUser
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'password', 'Kontak'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
    }

    public function tokoBuku()
    {
        return $this->hasOne(TokoBuku::class, 'Id_seller');
    }

    public function buku()
    {
        return $this->hasMany(Buku::class, 'Id_seller');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        return true;
    }
}
