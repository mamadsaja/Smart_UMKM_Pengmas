<?php

namespace App\Models;

use Filament\Forms\Components\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['kategori' => 'array',];
    protected $fillable = ['judul', 'toko_buku_id', 'penulis_id', 'penerbit_id', 'kategori', 'tahun_terbit', 'harga', 'stok', 'deskripsi', 'gambar', 'penulis', 'penerbit', 'Link_Marketplace', 'Link_Shopee', 'Link_Tokopedia'];

    public function tokoBuku()
    {
        return $this->belongsTo(TokoBuku::class, 'toko_buku_id');
    }

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'penulis_id');
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id');
    }

    public function kategoris()
    {
        return $this->belongsToMany(Kategori::class, 'genre', 'idBuku', 'idKategori');
    }

    public function getKategoriAttribute()
    {
        return $this->kategoris->pluck('namaKategori')->implode(', ');
    }

    public function getKategoriListAttribute()
    {
        return $this->kategoris->pluck('namaKategori')->toArray();
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'Id_seller');
    }


}
