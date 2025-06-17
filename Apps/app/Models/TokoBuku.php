<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoBuku extends Model
{
    use HasFactory;
    protected $guarded = 'id';
    protected $table = 'toko_bukus';
    // protected $casts = ['Toko_Marketplace' => 'array', 'Nama_Marketplace' => 'array'];
    protected $fillable = ['Nama_Toko', 'Toko_Shopee', 'Toko_Tokopedia', 'Id_seller', 'Alamat', 'Kontak', 'name', 'deskripsi_toko', 'gambar_toko', 'banner', 'Instagram', 'Facebook', 'Tiktok'];

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'Id_seller');
    }

    public function bukus()
    {
        return $this->hasMany(Buku::class, 'toko_buku_id');
    }

    public function data_seller()
    {
        return $this->belongsTo(Seller::class);
    }

    
}

