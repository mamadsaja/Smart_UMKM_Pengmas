<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Seller extends Authenticatable
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
}
